<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStore extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'fancy_name' => 'required',
            'rg' => 'required',
            'organ' => 'required',
            'cpf' => 'required',
            'date_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'marital_status' => 'required',
            'education' => 'required',
            'city_birth' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'shirt' => 'required',
            'pants' => 'required',
            'feet' => 'required',
            'dummy' => 'required',
            'skin_color' => 'required',
            'eye_color' => 'required',
            'hair_color' => 'required',
            'hair_type' => 'required',
            'hair_size' => 'required',
            'tattoo' => 'required',
            'tattoo_location' => 'required',
            'practice_sports' => 'required',
            'play_instrument' => 'required',
            'film_outside' => 'required',
            'make_figuration' => 'required',
            'make_event' => 'required',
            'bank_nro' => 'required',
            'back_agency' => 'required',
            'bank_account' => 'required',
            'bank_holder_name' => 'required',
            'bank_holder_cpf' => 'required',

            // 'password' => 'required|min:8|confirmed'
        ];
    }
}
