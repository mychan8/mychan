<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemarkPostForm extends FormRequest
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
            'content' => 'required|string|min:8|max:2000',
        ];
    }

    public function attributes()
    {
        return [
            'comentario' => 'del comentario',
        ];
    }
}
