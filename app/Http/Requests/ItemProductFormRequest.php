<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemProductFormRequest extends FormRequest
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
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_sn' => '',
            'item_mn' => '',
            'item_stock' => 'required|integer',
            'item_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'item_details' => '',
            'item_remark' => '',
            'status' => 'required',
        ];
    }
}
