<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /* 32-bit int max value */
        $maxPriceValue = 2 ** 31 - 1;
        return [
            'title'=> 'required|max:64|min:5',
            'content'=> 'required|max:500|min:10',
            'price' => "required|integer|min:0|max:$maxPriceValue|multiple_of:1000",
        ];
    }
}
