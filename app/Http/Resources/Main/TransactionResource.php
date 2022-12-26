<?php

namespace App\Http\Resources\Main;

use App\Http\Resources\Resource;

class TransactionResource extends Resource
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
            'ticket_id' => $this->ticket_id,
            'amount' => $this->amount,
            'payment_date' => dateYmdToDmy($this->payment_date),
            'total_price' => $this->price,
            'package' => $this->package->name,
            'user' => $this->user->name
        ];
    }
}