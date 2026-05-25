<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Bước 1: Thêm hàm authorize và trả về true
     */
    public function authorize(): bool
    {
        // Trả về true để cho phép mọi người (hoặc mọi request) đi qua được lớp bảo vệ này
        return true; 
    }

    /**
     * Bước 2: Sửa lại rules để tránh lỗi khi chưa đăng nhập
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                // Dùng optional() để tránh lỗi nếu $this->user() là null khi bạn đang test
                Rule::unique(User::class)->ignore(optional($this->user())->id),
            ],
        ];
    }
}