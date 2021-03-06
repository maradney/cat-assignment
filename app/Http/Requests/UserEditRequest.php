<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $rid = request()->get('resource_id');
        return [
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users,email,' . $rid,
            'password' => 'nullable|max:100',
        ];
    }
}
