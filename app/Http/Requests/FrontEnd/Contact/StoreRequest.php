<?php

namespace App\Http\Requests\FrontEnd\Contact;

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
            'name' => 'required|min:3|max:191',
            'email' => 'required|min:10|max:191|email',
            'message' => 'required|min:10|max:500',
        ];
    }
}
