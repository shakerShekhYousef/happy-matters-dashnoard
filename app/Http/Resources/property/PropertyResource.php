<?php

namespace App\Http\Resources\property;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tags' => $this->tags,
            'sale_value' => $this->sale_value,
            'type' => $this->type == 1  ? 'Residential' : ($this->type == 2 ? 'Commercial' : ($this->type == 3 ? 'Mixed' : 'Hotel')),
            'floors' => $this->floors,
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
            'amenities' => $this->getAmenitiesList()
        ];
    }
}
