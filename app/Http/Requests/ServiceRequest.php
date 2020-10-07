<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'kos' => 'numeric',
            'tarikh' => 'required',
            'no_kenderaan' => 'required',
            'service' => 'required|array|min:1'
        ];


    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Ruangan ini perlu di isi',
            'numeric' => 'Sila masukkan dengan format yang betul Cth : 123.50',
            'service.required' => 'Ruangan ini perlu di pilih sekurang - kurangnya satu',
        ];
    }
}
