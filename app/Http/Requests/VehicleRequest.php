<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'office_id' => 'required',
            'no_siri_b' => 'required',
            'no_enjin' => 'required',
            'no_casis' => 'required',
            'tarikh_pendaftaran' => 'required',
            'tarikh_perolehan' => 'required',
            'no_kenderaan' => 'required|unique:vehicles',
            'model' => 'required',
            'jenis' => 'required',
            'no_fail' => 'required'
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
        ];
    }
}
