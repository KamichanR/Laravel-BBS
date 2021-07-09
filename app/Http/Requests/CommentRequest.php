<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'poster' => 'required',
            'email' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'poster.required' => '名前は必須です',
            'email.required' => 'メールアドレスは必須です',
            'body.required' => '内容は必須です',
        ];
    }
}
