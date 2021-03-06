<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'

            'nom' => 'required|min:3|max:105',
            'prenom' => 'required|min:3|max:105',
            'adresse' => 'required|min:2|max:205',
            'email' => 'required|email',
            'admin' => 'required',
            'imgPath' => 'required',
            'ca' => 'numeric|required',
            'login' => 'required|min:5|max:45',
            'motdepasse' => 'string|required|alpha_num|between:8,50',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom.required' => 'le nom du client est requis.',
            'prenom.required' => 'le prénom du client est requis.',
            'adresse.required' =>"L'adresse est requis.",
            'email.required' => "L'email est requis.",
            
            'motdepasse.string' => ' Le mot de passe doit être une chaîne.',
            'motdepasse.required' => ' Le mot de passe est requis.',
            'motdepasse.between' => ' Le mot de passe doit comporter entre 8 et 50 caractères..',
           
            'ca.numeric' => " Le chiffre d'affaire doit être un nombre.",
            'ca.required' => ' Le mot de passe est requis.',
            
            'imgPath.required' => " L'image est requis.",
            'admin.required' => ' Le role est requis.',

            'login.numeric' => " login doit contenir au minimum 5 caracteres.",
            'login.required' => 'login est requis.',            
        ];
    }
}
