<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OyappRequest extends FormRequest
{
    public function rules()
    {
        return [
            'oyapp.body' => 'required|string|max:100',
        ];
    }
}
