<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Requests\Request;



class DespuesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /*
    public function authorize(): bool
    {
        return Auth::check();
    }

    */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function storeRules(): array
{
    return [

        'registro_id'    => 'required|integer|exists:registros,id',
        'nivel_llenado'  => 'nullable|in:0%,12.5%,25%,37.5%,50%,62.5%,75%,87.5%,100%',
        'foto' => 'nullable|file|image|mimes:jpeg,png,jpg,heic,heif|max:20480',
        'observaciones'  => 'nullable|string|max:1000',
        
    ];
}

}