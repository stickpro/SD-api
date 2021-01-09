<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
                'title'           => 'required_with_all:ru,en|max:255',
                'slug'            => 'required_with_all:ru,en|max:255',
                'seo_title'       => 'required_with_all:ru,en|max:255',
                'seo_description' => 'required_with_all:ru,en',
                'seo_keywords'    => 'required_with_all:ru,en',
                'description'     => 'required_with_all:ru,en',
                'filter_id'       => 'required|integer',
                'external_link'   => 'required|string',
                'image_id'        => 'required',
                'mockup_id'       => 'required',
        ];
    }
}
