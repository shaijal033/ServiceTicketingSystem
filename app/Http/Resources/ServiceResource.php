<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            'ticket_number' => $this->ticket_number,
            'customer_name' => $this->customer_name,
            'service_type' => $this->service_type,
            'appointment_datetime' => $this->appointment_datetime->format('Y-m-d H:i:s'),
            'contact_number' => $this->contact_number,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }
}
