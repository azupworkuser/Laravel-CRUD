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
        return [
            'user_id' => 'required|exists:users,id|numeric',
            'title' => 'nullable|max:255',
            'slug' => 'nullable|unique:posts,slug|max:255',
            'status' => 'required|in:draft,published,canceled',
            'body' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id|numeric',
            'image' => 'nullable|max:255',
            'published_at' => 'nullable|date',
            'total_view' => 'required|numeric',
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
