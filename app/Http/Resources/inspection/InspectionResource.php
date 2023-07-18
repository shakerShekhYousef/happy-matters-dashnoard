<?php

namespace App\Http\Resources\inspection;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Inspection;

class InspectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'inspection_type' => $this->inspection_type == 1  ? 'move in' : ($this->inspection_type == 2 ? 'move out' : ($this->inspection_type == 3 ? 'quarterly' : 'general')),

            'inspector_id'=>$this->inspector_id,
            'inspection_date'=>$this->inspection_date,
            'inspection_time'=>$this->inspection_time,
            'property'=>$this->property(),
            'unit'=>$this->unit(),
            'notes'=>$this->notes,
           
        ];
    }
}
