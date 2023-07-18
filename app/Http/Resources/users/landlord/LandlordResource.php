<?php

namespace App\Http\Resources\users\landlord;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Landlord;
use App\Models\LandlordDocuments;

class LandlordResource extends JsonResource
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
            'fname' => $this->fname,
            'lname' => $this->lname,
            'tax_registration' => $this->tax_registration,
            'mobile' => $this->mobile,
            'national_id' => $this->national_id,
            'national_id_expiry' => $this->national_id_expiry,
            'passport_no' => $this->passport_no,
            'passport_expiry' => $this->passport_expiry,
            'visa_state' => $this->visa_state,
            'name_on_contract' => $this->name_on_contract,
            'email_on_contract' => $this->email_on_contract,
            'phone_on_contract' => $this->phone_on_contract,
            'bank_name' => $this->bank_name,
            'bank_address' => $this->bank_address,
            'iban' => $this->iban,
            'swift' => $this->swift,
            'options' => $this->options == 1  ? 'send push notifications' : ($this->options == 2 ? 'send email notification' : 'auto hold amount in wallet' ),

            'notes' => $this->notes,
            'documents'=> $this->getLandlordDocuments(),
          
        ];
    }
}
