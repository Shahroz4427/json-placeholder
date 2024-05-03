<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdatePhotosRequest extends FormRequest
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
        $rules= [
            'album_Id'=>'required|exists:albums,id',
            'title'=>'required|string|max:255',
            'url'=>'required|string|max:255',
            'thumbnailUrl'=>'required|string|max:255'
        ];

        if($this->isMethod('PATCH'))
        {
            $rules['album_Id']='sometimes|exists:albums,id';
            $rules['title']='sometimes|string|max:255';
            $rules['url']='sometimes|string|max:255';
            $rules['thumbnailUrl']='sometimes|string|max:255';

        }
        return $rules;
    }
}
