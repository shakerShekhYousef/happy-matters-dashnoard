<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Maintenance;
use App\Models\MaintenanceDocuments;
use App\Models\MaintenanceMedia;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

use App\Http\Resources\maintenance\MaintenanceResource;
use Illuminate\Validation\ValidationException;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::get();
        return view('dashboard.maintenance.listMaintenances', ['maintenances' => collect(MaintenanceResource::collection($maintenances))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::get(['unit_number', 'id']);
        $properties = Property::get(['name', 'id']);
        return view('dashboard.maintenance.createMaintenance', ['units' =>  $units, 'properties' => $properties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accepted_images_ext = ['png', 'jpeg', 'jpg'];
        $accepted_videos_ext = ['mp4'];

        foreach ($request->file('media') as $key => $value) {
            if ($request->media_type[$key] == "photo") {
                if (!in_array($value->extension(), $accepted_images_ext)) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'photo' => ['Please select proper image type, png,jpeg,jpg']
                    ]);
                    throw $error;
                }
            } else if ($request->media_type[$key] == "video") {
                if (!in_array($value->extension(), $accepted_videos_ext)) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'video' => ['Please select proper video type mp4']
                    ]);
                    throw $error;
                }
            }
        }

        $this->validate($request, [
            'maintenance_category' => 'required',
            'responsible_person' => 'required',
            'title' => 'required',
            'property_id' => 'required',
            'unit_id' => 'required',
            'media.*' => 'mimes:png,jpg,jpeg,mp4',
            'documents.*' => 'mimes:pdf',
        ]);

        try {
            $maintenance = Maintenance::firstOrCreate([

                'maintenance_category' => $request->maintenance_category,
                'responsible_person' => $request->responsible_person,
                'title' => $request->title,
                'details' => $request->details,
                'property_id' => $request->property_id,
                'unit_id' => $request->unit_id,
                'available_date' => $request->available_date,
                'time_slot' => $request->time_slot,
                'priority' => $request->priority,
            ]);
            if ($maintenance->wasRecentlyCreated) {

                if ($request->file('documents')) {
                    foreach ($request->file('documents') as $key => $document) {
                        $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                        $document->move(storage_path('app/public/maintenance/documents'), $fileName);
                        $maintenance_document = MaintenanceDocuments::create([
                            'name' => $document != null ? ('storage/maintenance/documents/' . $fileName) : null,
                            'type' => $request->document_types[$key],
                            'maintenance_id' => $maintenance->id,
                        ]);
                    }
                }
                if ($request->file('media')) {
                    foreach ($request->file('media') as $key => $media) {
                        $fileName = rand(0, 10000) . time() . '.' . $media->extension();
                        $media->move(storage_path('app/public/maintenance/media'), $fileName);
                        $maintenance_media = MaintenanceMedia::create([
                            'name' => $media != null ? ('storage/maintenance/media/' . $fileName) : null,
                            'media_type' => $request->media_type[$key],
                            'maintenance_id' => $maintenance->id,
                        ]);
                    }
                }
                return redirect()->route('web_maintenances_list')->with('message', 'Maintenance added');
            } else
                return redirect()->route('web_maintenances_list')->withErrors('Maintenance already found!');
        } catch (\Throwable $th) {
            $this->errorLog('MaintenanceController@store', $th->getMessage());
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
        $units = Unit::get(['unit_number', 'id']);
        $properties = Property::get(['name', 'id']);
        $maintenance = Maintenance::find($id);
        return view('dashboard.maintenance.showMaintenance', ['properties' => $properties, 'units' => $units, 'maintenance' => collect(new MaintenanceResource($maintenance))]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::get(['unit_number', 'id']);
        $properties = Property::get(['name', 'id']);
        $maintenance = Maintenance::find($id);

        return view('dashboard.maintenance.editMaintenance', ['maintenance' =>  $maintenance, 'units' =>  $units, 'properties' => $properties]);
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
            'maintenance_category' => 'required',
            'responsible_person' => 'required',
            'title' => 'required',

            'property_id' => 'required',
            'unit_id' => 'required',
            'media.*' => 'mimes:png,jpg,jpeg,mp4',

            'documents.*' => 'mimes:pdf',

        ]);
        $maintenance = Maintenance::find($id);


        $request->maintenance_category != null ? $maintenance->maintenance_category = $request->maintenance_category : null;
        $request->responsible_person != null ? $maintenance->responsible_person = $request->responsible_person : null;
        $request->title != null ? $maintenance->title = $request->title : null;
        $request->details != null ? $maintenance->details = $request->details : null;
        $request->property_id != null ? $maintenance->property_id = $request->property_id : null;
        $request->unit_id != null ? $maintenance->unit_id = $request->unit_id : null;
        $request->available_date != null ? $maintenance->available_date = $request->available_date : null;
        $request->time_slot != null ? $maintenance->time_slot = $request->time_slot : null;
        $request->priority != null ? $maintenance->priority = $request->priority : null;
        $maintenance->save();

        //////////////////////////

        if ($request->file('documents')) {
            foreach ($maintenance->documents as $document) {
                if (File::exists(public_path($document->name)))
                    File::delete(public_path($document->name));
            }
            $maintenance->documents()->delete();
            foreach ($request->file('documents') as $key => $document) {
                $fileName = rand(0, 10000) . time() . '.' . $document->extension();
                $document->move(storage_path('app/public/maintenance/documents'), $fileName);
                $maintenance_document = MaintenanceDocuments::create([
                    'name' => $document != null ? ('storage/maintenance/documents/' . $fileName) : null,
                    'type' => $request->document_types[$key],
                    'maintenance_id' => $maintenance->id,
                ]);
            }
        }

        if ($request->has('media')) {
            foreach ($maintenance->medias as $media) {
                if (File::exists(public_path($media->name)))
                    File::delete(public_path($media->name));
            }
            $maintenance->medias()->delete();
            foreach ($request->file('media') as $key => $media) {
                $fileName = rand(0, 10000) . time() . '.' . $media->extension();
                $media->move(storage_path('app/public/maintenance/media'), $fileName);
                $maintenance_media = MaintenanceMedia::create([
                    'name' => $media != null ? ('storage/maintenance/media/' . $fileName) : null,
                    'media_type' => $request->media_type[$key],
                    'maintenance_id' => $maintenance->id,
                ]);
            }
        }

        return redirect()->route('web_maintenances_list')->with('message', 'maintenance updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);
        foreach ($maintenance->documents as $document) {
            if (File::exists(public_path($document->name)))
                File::delete(public_path($document->name));
        }
        $maintenance->documents()->delete();
        foreach ($maintenance->medias as $media) {
            if (File::exists(public_path($media->name)))
                File::delete(public_path($media->name));
        }
        $maintenance->medias()->delete();
        $maintenance->delete();
        return redirect()->route('web_maintenances_list')->with('message', 'maintenance deleted');
    }

    public function document($id)
    {
        $maintenances = maintenanceDocuments::where('maintenance_id', $id)->get();
        return view('dashboard.maintenance.listdocuments')->with('maintenances', $maintenances);
    }

    public function media($id)
    {
        $maintenances = MaintenanceMedia::where('maintenance_id', $id)->get();
        return view('dashboard.maintenance.listmedia')->with('maintenances', $maintenances);
    }
}
