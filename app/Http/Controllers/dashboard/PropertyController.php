<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\Landlord;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\AmenityProperty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Http\Resources\property\PropertiesResource;
use App\Http\Resources\property\PropertyResource;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::get();
        return view('dashboard.property.listProperties', ['properties' => collect(PropertyResource::collection($properties))]);
    }

    public function create()
    {
        $amenities = Amenity::pluck('name', 'id');
        $landlords = Landlord::get();
        $countries = Country::pluck('name', 'id');
        return view('dashboard.property.createProperty', ['amenities' =>  $amenities, 'landlords' => $landlords, 'countries' => $countries]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sale_value' => 'required',
            'floors' => 'required',
            'area' => 'required',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'state' => 'required|string',
            'country' => 'required',
            'landlord' => 'required'
        ]);
        try {
            $property = Property::firstOrCreate([
                'name' => $request->name
            ], [
                'name' => $request->name,
                'tags' => $request->tags,
                'sale_value' => $request->sale_value,
                'type' => $request->type,
                'floors' => $request->floors,
                'area' => $request->area,
                'plot' => $request->plot,
                'makani_number' => $request->makani_number,
                'permit_number' => $request->permit_number,
                'community' => $request->community,
                'sub_community' => $request->sub_community,
                'notes' => $request->notes,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'country_id' => $request->country,
                'postcode' => $request->postcode,
                'maintenance_active' => $request->maintenance_active == null ? 0 : 1,
                'alert_message' => $request->alert_message,
                'landlord_id' => $request->landlord,

            ]);
            if ($property->wasRecentlyCreated) {
                $amenities = $request->input('amenities');
                $property->Amenities()->attach($amenities);
                return redirect()->route('web_properties_list')->with('message', 'Property added');
            } else
                return redirect()->route('web_properties_list')->withErrors('Property already found!');
        } catch (\Throwable $th) {
            $this->errorLog('PropertyController@store', $th->getMessage());
        }
    }

    ///////////////////////
    public function show($id)
    {
        $property = Property::find($id);
        return view('dashboard.property.showProperty', ['property' => collect(new PropertyResource($property))]);
    }

    /////////////////////////
    public function edit($id)
    {
        $amenities = Amenity::pluck('name', 'id');
        $landlords = Landlord::get();
        $countries = Country::pluck('name', 'id');
        $property = Property::find($id);
        return view('dashboard.property.editProperty', ['property' => $property, 'countries' => $countries, 'landlords' => $landlords, 'amenities' => $amenities]);
    }
    ////////
    public function update(Request $request, $id)
    {
        $property = Property::find($id);
        $request->name != null ? $property->name = $request->name : null;
        $request->tags != null ? $property->tags = $request->tags : null;
        $request->sale_value != null ? $property->sale_value = $request->sale_value : null;
        $request->type != null ? $property->type = $request->type : null;
        $request->floors != null ? $property->floors = $request->floors : null;
        $request->area != null ? $property->area = $request->area : null;
        $request->plot != null ? $property->plot = $request->plot : null;
        $request->makani_number != null ? $property->makani_number = $request->makani_number : null;
        $request->permit_number != null ? $property->permit_number = $request->permit_number : null;
        $request->community != null ? $property->community = $request->community : null;
        $request->sub_community != null ? $property->sub_community = $request->sub_community : null;
        $request->notes != null ? $property->notes = $request->notes : null;
        $request->address1 != null ? $property->address1 = $request->address1 : null;
        $request->address2 != null ? $property->address2 = $request->address2 : null;
        $request->city != null ? $property->city = $request->city : null;
        $request->state != null ? $property->state = $request->state : null;
        $request->country != null ? $property->country_id = $request->country : null;
        $request->postcode != null ? $property->postcode = $request->postcode : null;
        $request->maintenance_active != null ? $property->maintenance_active = 1 : $property->maintenance_active = 0;
        $request->alert_message != null ? $property->alert_message = $request->alert_message : null;
        $request->landlord != null ? $property->landlord_id = $request->landlord : null;
        $property->save();

        $amenities = $request->input('amenities');
        $property->Amenities()->detach();
        $property->Amenities()->attach($amenities);

        return redirect()->route('web_properties_list')->with('message', 'Property updated');
    }
    //////////////
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->Amenities()->detach();
        $property->delete();
        return redirect()->route('web_properties_list')->with('message', 'Property deleted');
    }
}
