<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'number' => ['required', 'min:1'],
            'postal_code' => ['required', 'min:3'],
            'street' => ['required', 'min:3'],
        ];
    }
}
