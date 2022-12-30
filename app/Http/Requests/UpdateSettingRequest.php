<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->type === 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'string|required',
            'description'=>'string|required',
            'email'=>'email|required',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook'=>'string|nullable',
            'twitter'=>'string|nullable',
            'instagram'=>'string|nullable',
            'youtube'=>'string|nullable',
            'tiktok'=>'string|nullable',
        ];
    }
}
