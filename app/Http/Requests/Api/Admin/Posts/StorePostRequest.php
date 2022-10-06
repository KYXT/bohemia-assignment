<?php

namespace App\Http\Requests\Api\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'         => 'required|string|unique:posts,title|min:10|max:64',
            'h1'            => 'required|string|min:10|max:64',
            'content'       => 'required|string|min:10|max:10000',
            'description'   => 'nullable|string|min:10|max:1000',
            'keywords'      => 'nullable|string|min:10|max:1000',
        ];
    }
}
