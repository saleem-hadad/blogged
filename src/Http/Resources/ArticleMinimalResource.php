<?php

namespace BinaryTorch\Blogged\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleMinimalResource extends JsonResource
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
            'title'     => $this->title,
            'slug'      => $this->slug,
            'image'     => $this->image,
            'published' => $this->published,
        ];
    }
}
