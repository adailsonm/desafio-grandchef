<?php

namespace App\Http\Requests;

use App\Models\Pessoas;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePessoasRequest extends FormRequest
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
            'nome' => 'required',
            'senha' => 'required',
            'email' => 'required|email|unique:pessoas',
            'data_nascimento' => 'required|date|before_or_equal:now'
        ];
    }
}
