<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Location extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'Pharmacy Name' => $this->pharmacy_name,
            'Address'       => $this->address,
            'City'          => $this->city,
            'State'         => $this->state,
            'Postal Code'   => $this->postal_code
        ];
    }
}
