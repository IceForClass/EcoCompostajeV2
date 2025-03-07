<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Requests\Request;



class DuranteRequest extends Request
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
        'registro_id' => 'required|integer|exists:registros,id',
        'riego' => 'nullable|boolean',
        'remover' => 'nullable|boolean',
        'aporte_verde' => 'nullable|boolean',
        'cantidad_aporteVLitros' => 'nullable|numeric|min:0|max:100.99',
        'cantidad_aporteVKilos' => 'nullable|numeric|min:0|max:100.99',
        'tipo_aporteV' => 'nullable|string|max:255',
        'aporte_seco' => 'nullable|boolean',
        'cantidad_aporteSLitros' => 'nullable|numeric|min:0|max:100.99',
        'cantidad_aporteSKilos' => 'nullable|numeric|min:0|max:100.99',
        'tipo_aporteS' => 'nullable|string|max:255',
        'olor' => 'nullable|in:sin olor,cuadra,agradable,desagradable',
        'foto' => 'nullable|file|image|mimes:jpeg,png,jpg|max:7168',
        'observaciones' => 'nullable|string|max:1000',
    ];
}

}