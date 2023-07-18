<?php

namespace App\Http\Resources\users\vendor;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Vendor;
use App\Models\Country;


class VendorResource extends JsonResource
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
            'email' => $this->email,
            'password' => $this->password,
            'company_name' => $this->company_name,
            'contact_name' => $this->contact_name,
            'category' => $this->category,
            'tax_registration' => $this->tax_registration,
            'mobile' => $this->mobile,
            'country' => $this->getCountryName(),
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'postcode' => $this->postcode,
            'notes' => $this->notes,
            'auto_assigned' => $this->auto_assigned,
          
          
        ];
    
    }
}
