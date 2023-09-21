<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'logo' => $this->logo,
            'site_name' => $this->site_name,
            'salogan' => $this->salogan,
            'footer_address' =>  $this->footer_address,
            'footer_phone' =>  $this->footer_phone,

        ];
    }
}
