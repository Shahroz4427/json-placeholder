<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreAlbumsRequest extends FormRequest
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
    #[ArrayShape(['user_id' => "string", 'title' => "string"])] public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'title'=>'required|string|max:255'
        ];
    }
}
