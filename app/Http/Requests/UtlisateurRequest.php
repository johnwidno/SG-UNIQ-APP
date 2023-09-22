<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtlisateurRequest extends FormRequest
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


        'nom'=>'required|string',
        'prenom'=>'required|string',
        'telephone'=>'required|string',
        //'Poste'=>'|string',
        'role'=>'required|integer',
        'email'=>'required|string',
       // 'password'=>'string|min:8',
       //'confirmpassword'=>'string|min:8',

        ];
    }
}
