<?php

namespace App\Http\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
                'id'    => $this->id,
                'slug'  => Storage::disk('cloudinary')->url($this->slug),
                'title' => $this->title,
                'alt'   => $this->alt
        ];
    }
}
