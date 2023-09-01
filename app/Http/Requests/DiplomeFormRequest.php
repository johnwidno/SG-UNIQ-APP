<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiplomeFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'codeEtudiant' => 'required|string|max:12',
            //'fichier' => 'required|file|mimes:pdf',
           'categorie' => 'required|string',
            'DateEmission' => 'required|date',
            'NumeroEnrUniq' => 'required|string',
            'mnfpCode' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'sexe' => 'required|string',
            'option' => 'required|string',
            'faculte' => 'required|string',
            //'status' => 'required|integer',

            'user_id' => 'required|integer',
        ];



    }
}
