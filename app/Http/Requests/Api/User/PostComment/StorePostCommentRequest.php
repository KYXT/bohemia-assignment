<?php

namespace App\Http\Requests\Api\User\PostComment;

use Illuminate\Foundation\Http\FormRequest;

class StorePostCommentRequest extends FormRequest
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
            'text'      => 'required|string|min:3|max:2000',
            'reply_id'  => 'nullable|integer|exists:post_comments,id',
        ];
    }
}