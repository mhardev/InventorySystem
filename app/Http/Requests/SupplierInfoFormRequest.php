<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierInfoFormRequest extends FormRequest
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
            'supplier_name' => 'required|min:3|max:255',
            'supplier_contact' => 'required|min:3|max:255',
            'supplier_email' => 'required|email',
            'supplier_owner' => 'required|min:3|max:255',
            'supplier_address' => 'required|min:3|max:255',
            'supplier_city' => 'required|min:3|max:255',
            'supplier_tin' => 'required|min:3|max:255',
            'supplier_bp' => 'required|min:3|max:255',
            'supplier_jepscert' => 'required|min:3|max:255',
            'supplier_myrp' => 'required|min:3|max:255',
            'supplier_philcert' => 'required|min:3|max:255',
            'category_id' => 'required',
            'status' => 'required',
        ];
    }
}
