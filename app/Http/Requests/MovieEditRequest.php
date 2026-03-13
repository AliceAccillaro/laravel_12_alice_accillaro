<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'director' => 'required',
            'year' => 'required|numeric',
            'plot' => 'required|min:5',
            'img' => 'nullable|image',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere almeno 3 caratteri',
            'director.required' => 'Il regista è obbligatorio',
            'year.required' => 'Il campo anno è obbligatorio',
            'year.numeric' => 'Il campo anno deve essere un numero',
            'plot.required' => 'La trama è obbligatoria',
            'plot.min' => 'La trama deve essere almeno 5 caratteri',
            'img.image' => 'Il file deve essere di tipo immagine',
            'genres.array' => 'Il formato dei generi non è valido',
            'genres.*.exists' => 'Uno dei generi selezionati non esiste',
        ];
    }
}