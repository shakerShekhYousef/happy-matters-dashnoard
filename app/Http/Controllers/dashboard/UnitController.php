<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Feature;
use App\Models\Utility;
use App\Models\Property;
use App\Models\UnitFeature;
use App\Models\UnitDocument;
use App\Models\UnitList;
use App\Models\UnitUtility;
use App\Http\Resources\UnitResource;
use App\Models\Announcement;
use App\Models\Contract;
use App\Models\Inspection;
use App\Models\InventoryItems;
use App\Models\Maintenance;
use Illuminate\Support\Facades\File;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('dashboard.unit.listUnits', ['units' => collect(UnitResource::collection($units))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::get(['name', 'id']);
        $utilities = Utility::pluck('name', 'id');
        $properties = Property::get(['name', 'id']);
        return view('dashboard.unit.createUnit', ['features' => $features, 'utilities' => $utilities, 'properties' => $properties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'unit_number' => 'required',
            'unit_type' => 'required',
            'size' => 'required',
            'service_charges_per_sqft' => 'required',
            'rent' => 'required',
            'deposit' => 'required',
            'property_photo' => 'required|mimes:png,jpg,jpeg',
            'property_id' => 'required',
            'documents' => 'required',
            'documents.*' => 'mimes:pdf',
            'lists' => 'required',
            'lists.*' => 'mimes:png,jpg,jpeg',
            'unit_category' => 'required'
        ]);
        try {

            if ($request->has('property_photo')) {
                $fileName = rand(0, 10000) . time() . '.' . $request->property_photo->extension();
                $request->property_photo->move(storage_path('app/public/units/property_photo'), $fileName);
            }

            $unit = Unit::firstOrCreate([
                'unit_number' => $request->unit_number
            ], [
                'unit_number' => $request->unit_number,
                'unit_type' => $request->unit_type,
                'size' => $request->size,
                'service_charges_per_sqft' => $request->service_charges_per_sqft,
                'rent' => $request->rent,
                'deposit' => $request->deposit,
                'beds' => $request->beds,
                'baths' => $request->baths,
                'electricity_no' => $request->electricity_no,
                'municipality_no' => $request->municipality_no,
                'gas_no' => $request->gas_no,
                'no_of_parkings' => $request->no_of_parkings,
                'parking_no' => $request->parking_no,
                'unit_status' => $request->unit_status,
                'unit_category' => $request->unit_category,
                'compound_no' => $request->compound_no,
                'floor' => $request->floor,
                'management_fee_type' => $request->management_fee_type,
                'management_fee' => $request->management_fee,
                'options' => json_encode($request->get('options')),
                'marketing_title' => $request->marketing_title,
                'marketing_description' => $request->marketing_description,
                'property_photo' => $request->has('property_photo') ? ('storage/units/property_photo/' . $fileName) : null,
                'property_id' => $request->property_id
            ]);

            if ($unit->wasRecentlyCreated) {
                $features = $request->input('features');
                $unit->unitFeatures()->attach($features);

                if ($request->has('documents')) {
                    foreach ($request->file('documents') as $document) {
                        $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                        $document->move(storage_path('app/public/units/documents'), $fileName);
                        $unit_document = UnitDocument::create([
                            'name' => $document != null ? ('storage/units/documents/' . $fileName) : null,
                            'unit_id' => $unit->id,
                        ]);
                    }
                }
                if ($request->has('lists')) {
                    foreach ($request->file('lists') as $list) {
                        $fileName = rand(0, 10000) . time() . '.' . $list->extension();
                        $list->move(storage_path('app/public/units/lists'), $fileName);
                        $unit_list = UnitList::create([
                            'name' => $list != null ? ('storage/units/lists/' . $fileName) : null,
                            'unit_id' => $unit->id,
                        ]);
                    }
                }
                return redirect()->route('web_units_list')->with('message', 'Unit added');
            } else
                return redirect()->route('web_units_list')->withErrors('Unit already found!');
        } catch (\Throwable $th) {
            $this->errorLog('UnitController@store', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::find($id);
        return view('dashboard.unit.showUnit', ['unit' => collect(new UnitResource($unit))]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $features = Feature::pluck('name', 'id');
        $utilities = Utility::pluck('name', 'id');
        $properties = Property::get(['name', 'id']);
        $unit = collect(new UnitResource(Unit::find($id)));
        return view('dashboard.unit.editUnit', ['unit' => $unit, 'features' => $features, 'utilities' => $utilities, 'properties' => $properties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_number' => 'required',
            'unit_type' => 'required',
            'size' => 'required',
            'service_charges_per_sqft' => 'required',
            'rent' => 'required',
            'deposit' => 'required',
            'property_photo' => 'mimes:png,jpg,jpeg',
            'property_id' => 'required',
            'documents.*' => 'mimes:pdf',
            'lists.*' => 'mimes:png,jpg,jpeg',
            'unit_category' => 'required'
        ]);
        $unit = Unit::find($id);
        if ($request->has('property_photo')) {
            if (File::exists($unit->property_photo)) {
                File::delete($unit->property_photo);
            }
            $fileName = rand(0, 10000) . time() . '.' . $request->property_photo->extension();
            $request->property_photo->move(storage_path('app/public/units/property_photo'), $fileName);
            $unit->property_photo = 'storage/units/property_photo/' . $fileName;
        }

        $request->unit_number != null ? $unit->unit_number = $request->unit_number : null;
        $request->unit_type != null ? $unit->unit_type = $request->unit_type : null;
        $request->size != null ? $unit->size = $request->size : null;
        $request->service_charges_per_sqft     != null ? $unit->service_charges_per_sqft     = $request->service_charges_per_sqft     : null;
        $request->rent != null ? $unit->rent = $request->rent : null;
        $request->deposit != null ? $unit->deposit = $request->deposit : null;
        $request->beds != null ? $unit->beds = $request->beds : null;
        $request->baths != null ? $unit->baths = $request->baths : null;
        $request->electricity_no != null ? $unit->electricity_no = $request->electricity_no : null;
        $request->municipality_no != null ? $unit->municipality_no = $request->municipality_no : null;
        $request->gas_no != null ? $unit->gas_no = $request->gas_no : null;
        $request->no_of_parkings != null ? $unit->no_of_parkings = $request->no_of_parkings : null;
        $request->parking_no != null ? $unit->parking_no = $request->parking_no : null;
        $request->unit_status != null ? $unit->unit_status = $request->unit_status : null;
        $request->unit_category != null ? $unit->unit_category = $request->unit_category : null;
        $request->compound_no != null ? $unit->compound_no = $request->compound_no : null;
        $request->floor != null ? $unit->floor = $request->floor : null;
        $request->management_fee_type != null ? $unit->management_fee_type = $request->management_fee_type : null;
        $request->management_fee != null ? $unit->management_fee = $request->management_fee : null;
        $request->options != null ? $unit->options = json_encode($request->options) : null;
        $request->marketing_title != null ? $unit->marketing_title = $request->marketing_title : null;
        $request->marketing_description != null ? $unit->marketing_description = $request->marketing_description : null;
        $request->property_id != null ? $unit->property_id = $request->property_id : null;
        $unit->save();
        $features = $request->input('features');
        $unit->unitFeatures()->detach();
        $unit->unitFeatures()->attach($features);
        //
        if ($request->has('documents')) {
            $documents = UnitDocument::where('unit_id', $id)->get();
            foreach ($documents as $key => $document) {
                if (File::exists($document->name)) {
                    File::delete($document->name);
                }
            }
            UnitDocument::where('unit_id', $id)->delete();
            foreach ($request->file('documents') as $document) {
                $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                $document->move(storage_path('app/public/units/documents'), $fileName);
                $unit_document = UnitDocument::create([
                    'name' => $document != null ? ('storage/units/documents/' . $fileName) : null,
                    'unit_id' => $unit->id,
                ]);
            }
        }
        if ($request->has('lists')) {
            $unitlists = UnitList::where('unit_id', $id)->get();
            foreach ($unitlists as $key => $unitlist) {
                if (File::exists($unitlist->name)) {
                    File::delete($unitlist->name);
                }
            }
            UnitList::where('unit_id', $id)->delete();
            foreach ($request->file('lists') as $list) {
                $fileName = rand(0, 10000) . time() . '.' . $list->extension();
                $list->move(storage_path('app/public/units/lists'), $fileName);
                $unit_list = UnitList::create([
                    'name' => $list != null ? ('storage/units/lists/' . $fileName) : null,
                    'unit_id' => $unit->id,
                ]);
            }
        }

        return redirect()->route('web_units_list')->with('message', 'Unit updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement =  Announcement::where('unit_id', $id)->first();
        $inventoryItems =  InventoryItems::where('unit_id', $id)->first();
        $contract =  Contract::where('unit_id', $id)->first();
        $inspection =  Inspection::where('unit_id', $id)->first();
        $maintenance =  Maintenance::where('unit_id', $id)->first();
        if ($announcement == null && $inventoryItems == null && $contract == null &&  $inspection == null && $maintenance == null) {
            $unit = Unit::find($id);
            $unit->unitFeatures()->detach();

            $documents = UnitDocument::where('unit_id', $id)->get();
            foreach ($documents as $key => $document) {
                if (File::exists($document->name)) {
                    File::delete($document->name);
                }
            }
            UnitDocument::where('unit_id', $id)->delete();

            $unitlists = UnitList::where('unit_id', $id)->get();
            foreach ($unitlists as $key => $unitlist) {
                if (File::exists($unitlist->name)) {
                    File::delete($unitlist->name);
                }
            }
            UnitList::where('unit_id', $id)->delete();

            $unit->delete();
            return redirect()->route('web_units_list')->with('message', 'Unit deleted');
        }
        if ($announcement != null)
            return redirect()->route('web_units_list')->withErrors('Unit cannot be deleted used in announcement');
        if ($inventoryItems != null)
            return redirect()->route('web_units_list')->withErrors('Unit cannot be deleted used in inventory items');
        if ($contract != null)
            return redirect()->route('web_units_list')->withErrors('Unit cannot be deleted used in contract');
        if ($inspection != null)
            return redirect()->route('web_units_list')->withErrors('Unit cannot be deleted used in inspection');
        if ($maintenance != null)
            return redirect()->route('web_units_list')->withErrors('Unit cannot be deleted used in maintenance');
    }
}
