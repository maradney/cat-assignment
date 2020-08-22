<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamCreateRequest extends FormRequest
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
            'name' => 'required|max:250',
            'video' => 'required|file|mimes:mp4',
            'video_thumbnail' => 'required|file|mimes:jpeg,bmp,png',
            'question.*.question' => 'required|max:250',
            'question.*.answer' => 'required|in:0,1,2',
            'question.*.answers.*' => 'required|max:250',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'question.*.question' => 'value',
            'question.*.answer' => 'value',
            'question.*.answers.*' => 'value',
        ];
    }
}
