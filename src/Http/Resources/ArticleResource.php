<?php

namespace BinaryTorch\Blogged\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'id'           => $this->id,
            'title'        => $this->title,
            'slug'         => $this->slug,
            'image'        => $this->image,
            'body'         => $this->body,
            'excerpt'      => $this->excerpt,
            'publish_date' => $this->publish_date ? $this->publish_date->toDateString() : 'NA',
            'published'    => $this->published,
            'featured'     => $this->featured,
            'created_at'   => $this->created_at->toDateString(),
            'category'     => [
                'id'       => $this->category->id,
                'title'    => $this->category->title,
                'slug'     => $this->category->slug,
            ],
            'author'       => [
                'name'     => $this->author->name,
                'avatar'   => $this->author->avatar,
            ],
        ];
    }
}
