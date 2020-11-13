<?php

namespace App\Http\Resources\Filter;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method getTranslations(string $string)
 * @property mixed id
 */
class FilterEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'id'   => $this->id,
                'name' => $this->getTranslations('name'),
        ];
    }
}
