<?php

namespace BinaryTorch\Blogged\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleFormRequest extends FormRequest
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
            'title'     => 'required|string|max:254',
            'slug'      => 'required|string|max:254',
            'image'     => 'required|string',
            'excerpt'   => 'required|string|max:254',
            'body'      => 'required|string',
            'category'  => 'required|string|exists:blogged_categories,slug',
            'published' => 'required',
            'featured'  => 'required',
        ];
    }
}
