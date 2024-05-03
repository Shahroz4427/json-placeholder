<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomersRequest extends FormRequest
{
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customers,email',
            'address.street' => 'required|string|max:255',
            'address.suite' => 'required|string|max:255',
            'address.city' => 'required|string|max:255',
            'address.zipcode' => 'required|string|max:255',
            'address.geo.lat' => 'required|string|max:255',
            'address.geo.lng' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'company.name' => 'required|string|max:255',
            'company.catch_phrase' => 'required|string|max:255',
            'company.bs' => 'required|string|max:255',
        ];
    }
}
