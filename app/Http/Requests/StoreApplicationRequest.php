<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{

    public function messages(): array
    {
        return [
            'subject.required' => 'Subject kiritilmagan',
            'subject.string' => 'Subject string bo\'lishi kerak',
            'subject.max' => 'Subject hajmi katta (max:255)',
            'message.required' => 'Message kiritilmagan',
            'message.string' => 'Message string bo\'lishi kerak',
            'file.file' => 'File mavjud emas',
            'file.mimes' => 'Faqat (png, jpg, pdf) turdagi fayllarni yuklash mumkin',
        ];
    }

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
        return [
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'file' => ['file', 'mimes:png,jpg,pdf']
        ];
    }
}
