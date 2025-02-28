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
        'cantidad_aporteVLitros' => 'nullable|integer|min:0|max:50',
        'cantidad_aporteVKilos' => 'nullable|integer|min:0|max:50',
        'tipo_aporteV' => 'nullable|string|max:255',
        'aporte_seco' => 'nullable|boolean',
        'cantidad_aporteSLitros' => 'nullable|integer|min:0|max:50',
        'cantidad_aporteSKilos' => 'nullable|integer|min:0|max:50',
        'tipo_aporteS' => 'nullable|string|max:255',
        'foto' => 'nullable|file|image|mimes:jpeg,png,jpg,heic,heif|max:20480',
        'observaciones' => 'nullable|string|max:1000',
    ];
}

}