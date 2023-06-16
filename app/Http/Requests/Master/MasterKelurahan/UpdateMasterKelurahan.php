<?php

namespace App\Http\Requests\Master\MasterKelurahan;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMasterKelurahan extends FormRequest
{
    use AuthorizesRequests;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'kecamatan_id' => 'required|numeric',
            'name' => 'required|string|max:50'
        ];
    }
}
