<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        return [
            // 'name' => ['required', 'string'],
            // 'cost_price' => ['required', 'numeric', 'between:1.0, 999.99'],
            // 'price' => ['required', 'numeric', 'between:1.0, 999.99'],
            // 'quantity' => ['required', 'integer', 'min:1'],
            // 'description' => ['required', 'string'],
            // 'policy' => ['required', 'string'],
            // 'image' => ['required', 'string'],
            // 'sub_category_id' => ['required']
        ];
    }
}
