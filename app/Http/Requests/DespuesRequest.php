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
        'nivel_llenado'  => 'nullable|in:0%,5%,10%,15%,20%,25%,30%,35%,40%,45%,50%,55%,60%,62.5%,65%,70%,75%,80%,85%,90%,95%,100%',
        'foto' => 'nullable|file|image|mimes:jpeg,png,jpg|max:7168',
        'observaciones'  => 'nullable|string|max:1000',
        
    ];
}

}