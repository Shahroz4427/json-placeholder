<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlbumsRequest extends FormRequest
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
        $rules= [
            'user_id' => 'required|exists:users,id',
            'title'=>'required|string|max:255'
        ];

        if($this->isMethod('PATCH'))
        {
            $rules['user_id']='sometimes|exists:users,id';
            $rules['title']='sometimes|string|max:255';
        }

        return $rules;

    }
}
