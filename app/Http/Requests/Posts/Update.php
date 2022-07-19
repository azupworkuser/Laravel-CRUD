<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest 
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
			'user_id' => 'required|exists:users,id|numeric',
			'title' => 'nullable|max:255',
			'slug' => 'nullable|max:255|unique:posts,slug,'.$this->route('post')->id,
			'status' => 'required|in:draft,published,canceled',
			'body' => 'nullable|string',
			'category_id' => 'nullable|exists:categories,id|numeric',
			'image' => 'nullable|max:255',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
     
        ];
    }

}
