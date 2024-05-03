<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateCommentsRequest extends FormRequest
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
    #[ArrayShape(['post_id' => "string", 'name' => "string", 'email' => "string", 'body' => "string"])] public function rules(): array
    {
        $rules = [
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'body' => 'required'
        ];

        if ($this->isMethod('PATCH')) {
            $rules['post_id'] = 'sometimes|exists:posts,id';
            $rules['name'] = 'sometimes|string|max:255';
            $rules['email'] = 'sometimes|string|email';
            $rules['body'] = 'sometimes';

        }

        return $rules;
    }
}
