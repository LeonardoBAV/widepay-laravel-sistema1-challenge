<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class UrlSaveRequest extends FormRequest
{

    public function rules()
    {
        return [
            'url' => 'required|string|url'
        ];
    }


    public function authorize()
    {
        return true;
    }

    public function messages()
{
    return [
        'url.required' => 'Url é campo obrigatório.',
        'url.url' => 'A Url inserida precisa ser uma url com um formato válido.'
    ];
}

    
}