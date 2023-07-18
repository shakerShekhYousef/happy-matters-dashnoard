<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            'password'=>$this->password,
            'fname'=>$this->fname,
            'mname'=>$this->mname,
            'lname'=>$this->lname,
            'is_company'=>$this->is_company,
            'company_name'=>$this->company_name,
            'trade_license'=>$this->trade_license,
            'tax_registration'=>$this->tax_registration,
            'trade_license_expiry'=>$this->trade_license_expiry,
            'dob'=>$this->dob,
            'phone'=>$this->phone,
            'additional_phone1'=>$this->additional_phone1,
            'additional_phone2'=>$this->additional_phone2,
            'gender'=>$this->gender,
            'marital_status'=>$this->marital_status,
            'national_id'=>$this->national_id,
            'national_id_expiry'=>$this->national_id_expiry,
            'passport'=>$this->passport,
            'passport_expiry'=>$this->passport_expiry,
            'visa_state'=>$this->visa_state,
            'home_country_id'=>$this->country($this->home_country_id),
            'country_id'=>$this->country($this->country_id),
            'address1'=>$this->address1,
            'address2'=>$this->address2,
            'city'=>$this->city,
            'state'=>$this->state,
            'postcode'=>$this->postcode,
            'notes'=>$this->notes,
            'visa_page'=>$this->visa_page,
            'national_id_photo'=>$this->national_id_photo,
            'passport_photo'=>$this->passport_photo,
            'visa_photo'=>$this->visa_photo,
            'documents'=>$this->getTenantDocuments(),
            'visa_page'=>$this->visa_page,

            'guests'=>$this->getTenantGuests(),
            'pets'=>$this->getTenantPets(),
            'vehicles'=>$this->getTenantVehicles()

        ];
       }
}
