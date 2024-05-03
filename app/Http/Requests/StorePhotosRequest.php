<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StorePhotosRequest extends FormRequest
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
    #[ArrayShape(['album_Id' => "string", 'title' => "string", 'url' => "string", 'thumbnailUrl' => "string"])] public function rules(): array
    {
        return [
            'album_Id'=>'required|exists:albums,id',
            'title'=>'required|string|max:255',
            'url'=>'required|string|max:255',
            'thumbnailUrl'=>'required|string|max:255'
        ];
    }
}
