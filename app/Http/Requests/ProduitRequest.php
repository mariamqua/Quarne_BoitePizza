<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'nom' => 'required|min:3|max:105',
            'prix' => 'required|numeric',
            'remise' => 'required|numeric',
            'isPromo' => 'required',
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
            'prix.required' => 'le prix du client est requis.',
            'remise.required' =>"L'adresse est requis.",
            'prix.numeric' => " Le prix doit être un nombre.",
            'remise.numeric' => " La remise doit être un nombre.",
            'isPromo.required' => "L'email est requis.",
            'imgPath.required' => "L'image est requis.",

        ];
    }
}
