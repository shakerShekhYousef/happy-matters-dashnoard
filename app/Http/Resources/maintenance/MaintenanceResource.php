<?php

namespace App\Http\Resources\maintenance;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Maintenance;
use App\Models\MaintenanceDocuments;
use App\Models\MaintenanceMedia;



class MaintenanceResource extends JsonResource
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
            'maintenance_category' => $this->maintenance_category,
            'responsible_person' => $this->responsible_person,
            'title' => $this->title,
            'details' => $this->details,
            'available_date' => $this->available_date,
            'time_slot' => $this->time_slot,
            'priority' => $this->priority,
            'remarks' => $this->remarks,
            'pictures' => $this->pictures,
            'videos' => $this->videos,
            'property'=>$this->property(),
            'unit'=>$this->unit(),
            'documents'=> $this->getMaintenanceDocuments(),
            'media'=> $this->getMaintenanceMedia(),


         
        ];
    }
}
