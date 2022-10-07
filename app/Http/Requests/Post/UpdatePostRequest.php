<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = Post::find($this->route('post'))[0];
        return $post && $this->user()->can('update', $post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => [
                'required',
                'max:350'
            ]
        ];
    }
}
