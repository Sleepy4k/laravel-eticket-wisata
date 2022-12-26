<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Resource;

class LoginResource extends Resource
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
            'username' => $this->username,
            'name' => $this->name,
            'phone' => $this->phone,
            'language' => $this->language
        ];
    }
}