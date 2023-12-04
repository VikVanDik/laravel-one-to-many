<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:2|max:50",
            "description" => "max:500",
            "url" => "required|max:250",
            "creation" => "required"
        ];
    }
    public function messages(){
        return [
        "name.required" => "Il nome è un campo obbligatorio.",
        "name.min" => "Il nome deve essere almeno di :min caratteri.",
        "name.max" => "Il nome deve essere minore di :max caratteri",
        "description.max" => "La descrizione non deve superare :max caratteri.",
        "url.required" => "L'URL è un campo obbligatorio.",
        "url.max" => "L'URL non deve superare :max caratteri.",
        "creation.required" => "La data di creazione è un campo obbligatorio."
        ];

}}
