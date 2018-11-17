<?php

namespace BinaryTorch\Blogged\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleFormRequest extends FormRequest
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
            'title'        => 'sometimes|required|string|max:254',
            'slug'         => 'sometimes|required|string|max:254',
            'image'        => 'sometimes|required|string',
            'excerpt'      => 'sometimes|required|string|max:254',
            'body'         => 'sometimes|required|string',
            'category_id'  => 'sometimes|required|exists:blogged_categories,id',
            'published'    => 'sometimes|required',
            'publish_date' => 'sometimes|required|date',
            'featured'     => 'sometimes|required',
        ];
    }
}
