<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        return [
            'delivery_name' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'delivery_name.required' => 'Tên ngh không được để trống !',
            'delivery_name.min' => 'Tên ngh ít nhất 6 ký tự'
        ];
    }
}
