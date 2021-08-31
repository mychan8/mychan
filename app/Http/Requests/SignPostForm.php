<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignPostForm extends FormRequest
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
            'user' => 'required|min:5|max:20',
            'password' => 'required|min:6|max:60',
        ];
    }

    public function attributes()
    {
        return [
            'user' => 'del usuario',
            'password' => 'de contraseña',
        ];
    }
}
