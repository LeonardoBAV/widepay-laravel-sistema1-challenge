<?php

namespace Modules\WidePayLaravelSistema1Challenge\Fortify;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Modules\WidePayLaravelSistema1Challenge\Entities\Client;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Client::class),
            ],
            'password' => $this->passwordRules(), // return ['required', 'string', new Password, 'confirmed'];
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'email', 'O campo email precisa estar no formato email',
            'email.unique' => 'Já existe um cadastro com este email.',
            'password.confirmed' => 'Confirmação da senha não esta igual a senha'])->validate();

        return Client::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
