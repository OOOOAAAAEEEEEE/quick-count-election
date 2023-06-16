<?php

namespace App\Http\Requests\Master\MasterUser;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Http\FormRequest;

class StoreMasterUser extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users,telp',
            'password' => 'required|string',
            'role' => 'required|string'
        ];
    }
}
