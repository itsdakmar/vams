<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        return auth()->check();
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
            'phone' => 'required|numeric|regex:/[0-9]{9}/',
            'email' => ['required', Rule::unique('users')->ignore($this->id)],
            'position' => 'required',
            'office_id' => 'required_if:position,==,selling'
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
            'required_if' => 'Ruangan ini perlu di isi',
            'phone.regex' => 'Ruangan ini perlu di isi dengan nombor sahaja. cth:01XXXXXXXX',
            'phone.numeric' => 'Ruangan ini perlu di isi dengan nombor sahaja. cth:01XXXXXXXX',
        ];
    }
}
