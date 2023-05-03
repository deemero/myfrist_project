<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                // 'regex:/[a-z]/',
                // 'regex:/[A-Z]/',
                // 'regex:[@$!%*#?&]',

            ],
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Nama tidak Boleh Kosong!',
            'email.required' => 'Isi email yang sah!',
            'password.required' => 'Password Tidak Boleh Kosong!',

        ];
    }
}
