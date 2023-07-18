<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Inspection;

use App\Models\Property;
use App\Models\Contract;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Http\Resources\inspection\InspectionsResource;
use App\Http\Resources\inspection\InspectionResource;

class InspectionController extends Controller
{
    public function index()
    {
        $inspections = Inspection::get();
        return view('dashboard.inspection.listInspections', ['inspections' => collect(InspectionResource::collection($inspections))]);
    }

    public function create()
    {
        $properties = Property::get(['name', 'id']);
        $units = Unit::get(['unit_number','id']);
        return view('dashboard.inspection.createInspection', ['properties' => $properties, 'units' => $units]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'inspection_type' => 'required',
            'inspection_date' => 'required',
            'inspection_time' => 'required',
            
        ]);
        try {
            $inspection = Inspection::firstOrCreate([
                'name' => $request->name
            ], [
                'name' => $request->name,
                'inspection_type' => $request->inspection_type,
                'inspector_id' => $request->inspector_id,
                'inspection_date' => $request->inspection_date,
                'inspection_time' => $request->inspection_time,
                'property_id' => $request->property_id,
                'unit_id' => $request->unit_id,
                'notes' => $request->notes,
               
            ]);
            if ($inspection->wasRecentlyCreated) {
              
                return redirect()->route('web_inspections_list')->with('message', 'Inspection added');
            } else
          
                return redirect()->route('web_inspections_list')->withErrors('Inspection already found!');
        } catch (\Throwable $th) {
            $this->errorLog('InspectionController@store', $th->getMessage());
        }
    }

    ///////////////////////
    public function show($id)
    {
        $inspection = Inspection::find($id);
        return view('dashboard.inspection.showInspection', ['inspection' => collect(new InspectionResource($inspection))]);
    }

    /////////////////////////
    public function edit($id)
    {
        $properties = Property::get(['name', 'id']);
        $units = Unit::get(['unit_number','id']);
        $inspection = Inspection::find($id);
        return view('dashboard.inspection.editInspection', ['inspection' => $inspection,'properties' => $properties, 'units' => $units]);
    }
    ////////
    public function update(Request $request, $id)
    {
        $inspection = Inspection::find($id);
        $request->name != null ? $inspection->name = $request->name : null;
        $request->inspection_type != null ? $inspection->inspection_type = $request->inspection_type : null;
        $request->inspector_id != null ? $inspection->inspector_id = $request->inspector_id : null;
        $request->inspection_date != null ? $inspection->inspection_date = $request->inspection_date : null;
        $request->inspection_time != null ? $inspection->inspection_time = $request->inspection_time : null;
        $request->property_id != null ? $inspection->property_id = $request->property_id : null;
        $request->unit_id != null ? $inspection->unit_id = $request->unit_id : null;
        $request->notes != null ? $inspection->notes = $request->notes : null;
       
        $inspection->save();


        return redirect()->route('web_inspections_list')->with('message', 'Inspection updated');
    }
    //////////////
    public function destroy($id)
    {
        $inspection = Inspection::find($id);
        $inspection->delete();
        return redirect()->route('web_inspections_list')->with('message', 'Inspection deleted');
    }
}
