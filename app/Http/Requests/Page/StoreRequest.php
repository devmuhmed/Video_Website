<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:191',
            'des' => 'required|min:10',
            'meta_keywords' => 'max:191',
            'meta_des' => 'max:191',
        ];
    }
}
