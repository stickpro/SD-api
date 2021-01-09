<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
                'id'              => $this->id,
                'filter_id'       => $this->filter_id,
                'image_id'        => $this->image_id,
                'mockup_id'       => $this->mockup_id,
                'title'           => $this->getTranslations('title'),
                'description'     => $this->getTranslations('description'),
                'slug'            => $this->getTranslations('slug'),
                'seo_title'       => $this->getTranslations('seo_title'),
                'seo_description' => $this->getTranslations('seo_description'),
                'seo_keywords'    => $this->getTranslations('seo_keywords'),
                'external_link'   => $this->external_link,
                'mockup'          => $this->mockup,
                'image'           => $this->image,
                'filter'          => $this->filter,
                'images'          => $this->images,
                'show_home'       => $this->show_home,

        ];
    }
}
