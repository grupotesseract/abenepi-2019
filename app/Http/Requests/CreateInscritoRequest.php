<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Inscrito;
use App\Rules\CPFValido;

class CreateInscritoRequest extends FormRequest
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
        $rules = [
            'cpf' => [
                'required',
                'unique:inscritos',
                new CPFValido
            ],
            'nome' => 'required',
            'profissao' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'numero' => 'required',
            'cep' => 'required|regex:/^[0-9]{5}-[0-9]{3}$/',
            'email' => 'required',
            'senha' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'valor' => 'required',
            'telefone' => 'required|regex:/\(?\d{2}\)?\s?\d{5}\-?\d{4}/',
            'nascimento' => 'required'
        ];
        
        return $rules;
    }
}
