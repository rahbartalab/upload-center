<?php

namespace App\Http\Requests\Api\v1\Discount;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'exists:discounts'],
            'price' => ['required', 'integer', 'max:100000'],
            'expired_at' => ['required', 'date', 'after:' . now()]
        ];
    }
}
