<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'email_confirmation' => 'required|email|same:email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.string' => 'Nome deve ser uma string',
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email inválido',
            'email.unique' => 'Email já existe',
            'email_confirmation.required' => 'Confirmação de email é obrigatório',
            'email_confirmation.email' => 'Confirmação de email inválido',
            'email_confirmation.same' => 'Confirmação de email deve ser igual ao email',
            'password.required' => 'Senha é obrigatório',
            'password.string' => 'Senha deve ser uma string',
            'password.min' => 'Senha deve ter no mínimo 8 caracteres',
        ];
    }
}
