<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SentenceRequest extends FormRequest
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
            'title' => 'required|max:20',
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
            'body' => 'required|max:30',
            'rating' => 'required',
        ];
    }


    public function messages()
    {
        return [
          'title.required' => 'タイトルを入力して下さい。',
          'title.max' => 'タイトルは20文字以内で入力して下さい。',
          'tags.regex' => 'タグでは「　(スペース)」 と 「/ 」は使用できません。',
          'body.required' => '本文を入力して下さい。',
          'body.max' => '本文は30文字以内で入力して下さい。',
          'rating.requied' => '作品評価を選択して下さい。',

        ];
    }

    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
