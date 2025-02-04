<?php

namespace App\Http\Requests\Api\V1;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class StoreQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // Turkish messages for validation
    public function messages()
    {
        return [
            'fullname.required' => 'Adı zorunludur',
            'email.required' => 'E-posta adresi zorunludur',
            'phone.required' => 'Telefon numarası zorunludur',
            'message.required' => 'Mesaj alanı zorunludur',
            'company.required' => 'Şirket adı zorunludur',
            'service.required' => 'Hizmet türü zorunludur',
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
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'phone' => 'required|string|min:10|max:255',
            'message' => 'required|string|min:10|max:255',
            'company' => 'required|string|max:255',
            'service' => 'required|string|max:255',
        ];
    }


       // Accept : Application/json headeri de bu işi yapabiliyor.
       protected function failedValidation(Validator $validator)
       {
           throw new HttpResponseException(response()->json([
               'success' => false,
               'message' => 'Validation failed',
               'errors' => $validator->errors()
           ], 422));
       }
}
