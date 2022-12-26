<?php

namespace App\Http\Requests\Api\Main\Transaction;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount' => ['required','numeric','min:1'],
            'status' => ['required','string','max:255'],
            'package_id' => ['required','numeric','min:1','exists:packages,id'],
            'user_id' => ['required','numeric','min:1','exists:users,id'],
            'total_price' => ['required','string','max:255']
        ];
    }
}
