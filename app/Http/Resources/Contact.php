<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class Contact extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'contact_info' => [
                'phone' => $this->phone,
                'toll' => $this->toll,
                'email' => $this->email,
                'address' => $this->address,
                'website' => $this->website


            ]
        ];
    }
}
