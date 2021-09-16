<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Post extends FormRequest
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
            'title' => 'required|string|min:3|max:30',
            'by' => 'required|string|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'content' => 'del comentario',
            'title' => 'del título',
        ];
    }

}
