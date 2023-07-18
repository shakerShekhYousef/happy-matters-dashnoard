<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Property;
use App\Models\Unit;
use App\Http\Resources\AnnouncementResource;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::get();
        return view('dashboard.announcement.listAnnouncements', ['announcements' => collect(AnnouncementResource::collection($announcements))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::get(['unit_number','id']);
        $properties = Property::get(['name', 'id']);
        return view('dashboard.announcement.createAnnouncement', ['units' =>  $units, 'properties' => $properties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id'=> 'required',
            'unit_id'=> 'required',
        ]);
        try {

            $announcement = Announcement::create([
                'property_id' => $request->property_id,
                'unit_id' => $request->unit_id,
                'subject' => $request->subject,
                'details' => $request->details

            ]);
            if ($announcement->wasRecentlyCreated) {

                return redirect()->route('web_announcements_list')->with('message', 'Announcement added');
           
        } else
        return redirect()->route('web_contracts_list')->withErrors('Contract already found!');

        } catch (\Throwable $th) {
            $this->errorLog('AnnouncementController@store', $th->getMessage());
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
        $announcement = Announcement::find($id);
        return view('dashboard.announcement.showAnnouncement', ['announcement' =>collect(new AnnouncementResource( $announcement))]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        $units = Unit::get(['unit_number','id']);
        $properties = Property::get(['name', 'id']);
        return view('dashboard.announcement.editAnnouncement', ['announcement' => $announcement, 'units' => $units, 'properties' => $properties]);
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
         
            'property_id'=> 'required',
            'unit_id'=> 'required',
         
    ]);
        
            $announcement = Announcement::find($id);
            $request->property_id != null ? $announcement->property_id = $request->property_id : null;
            $request->unit_id != null ? $announcement->unit_id = $request->unit_id : null;
            $request->subject != null ? $announcement->subject = $request->subject : null;
            $request->details != null ? $announcement->details = $request->details : null;
            $announcement->save();
            return redirect()->route('web_announcements_list')->with('message', 'Announcement Updated');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        $announcement->delete();
        return redirect()->route('web_announcements_list')->with('message', 'Announcement deleted');
    }
}
