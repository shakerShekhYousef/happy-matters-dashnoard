<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Unit;
use App\Models\Property;


class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $property=Property::find($this->property_id);
        return[
            'id'=>$this->id,
            'unit_number'=>$this->unit_number,
            'unit_type' => $this->unit_type == 1  ? 'apartment' : ($this->unit_type == 2 ? 'studio' : 'villa' ),

            'size'=>$this->size,
            'service_charges_per_sqft'=>$this->service_charges_per_sqft,
            'rent'=>$this->rent,
            'deposit'=>$this->deposit,
            'beds'=>$this->beds,
            'baths'=>$this->baths,
            'electricity_no'=>$this->electricity_no,
            'municipality_no'=>$this->municipality_no,
            'gas_no'=>$this->gas_no,
            'no_of_parkings'=>$this->no_of_parkings,
            'parking_no'=>$this->parking_no,
            'unit_status' => $this->unit_status == 1  ? 'Occupied' : ($this->unit_status == 2 ? 'Vacant' : ($this->unit_status == 3 ? 'Sold' : 'Reserved')),

            'unit_category' => ($this->unit_category == 1 ? 'Residential' : 'Commercial'),

            'compound_no'=>$this->compound_no,
            'floor'=>$this->floor,
            'management_fee_type' => ($this->management_fee_type == 1 ? 'Percentage' : 'Fixed'),

            'management_fee'=>$this->management_fee,
            'options'=>json_decode($this->options),
            'marketing_title'=>$this->marketing_title,
            'marketing_description'=>$this->marketing_description,
            'property_photo'=>$this->property_photo,
            'property'=>$property->name,
            'documents'=>$this->getUnitDocuments(),
            'features'=>$this->getUnitFeatures()->pluck('name'),
            'lists'=>$this->getUnitLists(),
            'utilities'=>$this->getUnitutilities()
        ];
    }
}
