<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoveryRequest extends FormRequest
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
            "alt_phone_number" => ["required"],
            "level" => [ "required" ],
            "installment_months" => [ "required", "numeric" ],
            "file_number" => [ "required" ],
            "form_fee" => [ "required" ],
            "first_payment" => [ "required" ],
            "processing_fee" => [ "required" ],
            "total_installment" => [ "required" ]
        ];
    }
}
