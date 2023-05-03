<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class OrderStoreRequest extends FormRequest
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
                    'rec_no' => 'required|max:7',
                    'address' => 'required|max:255',
                    'tel_no' => 'nullable|numeric',
                    'email' => 'nullable|email',
        ];

    }

    public function message(){
        return[
            'tel_no.numeric' => 'Hanya Nombor Diterima!!',
            'rec_no.required' => 'Sila Isi Ruang Resit',
            'email.email' => 'Isi email yang sah!',
        ];
    }
}
