<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Car;

class Save extends FormRequest
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
        $categories = config('cars.categories');
        return [
            'brand_id'=> 'required|exists:brands,id',
            'model'=> 'required|min:1|max:64',
            'vin'=>  ['required', 'digits:4', $this->vinUniqueRule()],
            'description'=> 'required|min:10|max:512',
            'category' => ['required', Rule::in(array_keys($categories))],
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }

    protected function vinUniqueRule()
    {
        return Rule::unique(Car::class, 'vin')->withoutTrashed();
    }
}
