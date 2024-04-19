<?php

namespace App\Http\Requests;

use App\Models\Claim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClaimRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('claim_create');
    }

    public function rules()
    {
        return [
            'points' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'amount_used' => [
                'required',
            ],
            'card_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
