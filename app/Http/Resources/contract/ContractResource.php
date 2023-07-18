<?php

namespace App\Http\Resources\contract;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Contract;
use App\Models\ContractDocuments;


class ContractResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_rent' => $this->total_rent,
            'deposit' => $this->deposit,
            'no_of_rent_payments' => $this->no_of_rent_payments,
            'money_held_by' => ($this->money_held_by == 1 ? 'landlord' : 'company'),

            'additional_terms' => $this->additional_terms,
            'remarks' => $this->remarks,
            'registered_tenancy_contract' => $this->registered_tenancy_contract,
            'tenancy_contract' => $this->tenancy_contract,
            'is_short_term_contract' => $this->is_short_term_contract,
            'property'=>$this->property(),
            'unit'=>$this->unit(),
            'tenant'=>$this->tenant(),
            'documents'=> $this->getContractDocuments(),
            'description'=>$this->description,

         
        ];
    }
}
