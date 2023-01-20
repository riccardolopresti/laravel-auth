<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name'=>'required|max:150|min:2',
            'client_name'=>'required|max:150|min:2',
            'summary'=>'required|max:255|min:2',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Il nome del progetto è un campo obbligatorio',
            'name.max'=>'Il nome del progetto deve avere al massimo :max caratteri',
            'name.min'=>'Il nome del progetto deve avere almeno :min caratteri',
            'client_name.required'=>'Il nome del cliente è un campo obbligatorio',
            'client_name.max'=>'Il nome del cliente deve avere al massimo :max caratteri',
            'client_name.min'=>'Il nome del cliente deve avere almeno :min caratteri',
            'summary.required'=>'La descrizione del progetto è un campo obbligatorio',
            'summary.max'=>'La descrizione del progetto deve avere al massimo :max caratteri',
            'summary.min'=>'La descrizione del progetto deve avere almeno :min caratteri',
            'cover_image.required'=>'URL dell\'immagine è un campo obligatorio',
            'cover_image.max'=>'URL dell\'immagine deve avere al massimo :max caratteri',
            'cover_image.min'=>'URL dell\'immagine deve avere almeno :min caratteri',
        ];
    }
}
