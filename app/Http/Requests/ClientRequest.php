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
            'name' => "required|string|alpha|max:255",
            'lastname' => 'required|string|alpha|max:255',     
            'document' => "required|integer",
            'phone' => "required|integer",  
            'city_municipality_id' => 'required|integer|exists:city_municipalities,id',  
            'email' => "nullable|string|email|max:100",
        ];
    }
}
