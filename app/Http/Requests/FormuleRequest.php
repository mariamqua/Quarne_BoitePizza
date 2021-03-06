<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class FormuleRequest extends FormRequest
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
            'prix' => 'required|numeric',
            'description' => 'required|min:10', 
            'imgPath' => 'required', 
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
            'prix.required' => 'le prénom du client est requis.',
            'prix.numeric' => " Le prix doit être un nombre.",
            'description.required' =>"L'adresse est requis.",
            'description.min' => ' description doit contenir au minimum 10 caracteres',
            'imgPath.required' => "L'image est requis.",
            
        ];
    }
}
