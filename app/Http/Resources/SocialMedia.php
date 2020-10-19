<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialMedia extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'social_media'=>[
                'facebook'=>$this->facebook,
                'google'=>$this->google,
                'twitter'=>$this->twitter,
                'instagram'=>$this->instagram
            ]
        ];
    }
}
