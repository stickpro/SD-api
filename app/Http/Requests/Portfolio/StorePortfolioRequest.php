<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
                'title'           => 'required|max:255',
                'slug'            => 'required|max:255',
                'seo_title'       => 'required|max:255',
                'seo_description' => 'required',
                'seo_keywords'    => 'required',
                'description'     => 'required',
                'filter_id'       => 'required|integer',
                'external_link'   => 'required|string',
                'image_id'        => 'required',
                'mockup_id'       => 'required',
        ];
    }
}
