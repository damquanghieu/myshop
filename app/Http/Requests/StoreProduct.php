<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required",
            'price' => 'required|numeric',
            'feature_image_path' => 'required',
            'image_detail' => 'required',
            'tags' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên sản phẩm không để trống!",
            'price.required' => "Giá sản phẩm không để trống!",
            'price.numeric' => "Giá sản phẩm phải là số!",
            'feature_image_path.required' => "Không được thiếu ảnh Feature!",
            'image-detail' => "Thiếu ảnh chi tiết!",
            "content.required" => "Nội dung sản phẩm không được để trống!",

        ];
    }
}
