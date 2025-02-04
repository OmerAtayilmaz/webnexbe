<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Newsletter;

class StoreNewsletterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    //Turkish messages for validation
    public function messages(): array
    {
        return [
            'email.required' => 'Email adresi zorunlu bir alandır.',
            'email.email' => 'Girdiğiniz email adresi geçerli değil.',
            'email.string' => 'Girdiğiniz email adresi string bir değer olmalıdır.',
            'email.max:255' => 'Girdiğiniz email adresi en fazla 255 karakter olmalıdır.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|string|max:255',
        ];
    }
}
