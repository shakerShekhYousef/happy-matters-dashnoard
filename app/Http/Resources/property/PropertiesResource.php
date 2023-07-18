<?php

namespace App\Http\Resources\property;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\AmenityProperty;
use App\Models\Property;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\Landlord;



class PropertiesResource extends JsonResource
{
    public function toArray($request)
    {
        // $country = Country::where('id', $this->country_id)->select('id')->first();
        // $landlord = Landlord::where('id', $this->landlord_id)->select('id')->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tags' => $this->tags,
            'sale_value' => $this->sale_value,
            'type' => $this->type,
            'floars' => $this->floars,
            'area' => $this->area,
            'plot' => $this->plot,
            'makani_number' => $this->makani_number,
            'permit_number' => $this->permit_number,
            'community' => $this->community,
            'sub_community' => $this->sub_community,
            'notes' => $this->notes,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->getCountryName(),
            'postcode' => $this->postcode,
            'maintenance_active' => $this->maintenance_active,
            'alert_message' => $this->alert_message,
            'landlord' => $this->getLandlordName(),
            'amenities' => $this->amenity($this->id)
        ];
    }
    public function amenity($id)
    {
        $amenity = AmenityProperty::where('properties_id', $id)->select('amenities_id')->get();
        $property_amenities = Amenity::whereIn('id', $amenity)->get();
        return $property_amenities;
    }
}
