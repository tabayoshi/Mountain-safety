<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        //投稿のバリデーション
        return [
            'title'=>'required | max:30',
            'article'=>'required',
            'climbing_time'=>'required',
            'downhill_time'=>'required',
            'mountain_id'=>'required | not_in: 0'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須項目です',
            'title.max' => 'タイトルは30文字以下にしてください',
            'article.required' => '記事は必須項目です',
            'climbing_time.required' => '登山日は必須項目です',
            'downhill_time.required' => '下山時間は必須項目です',
            'mountain_id.not_in' => '登山する山は必須項目です',
        ];
    }
}
