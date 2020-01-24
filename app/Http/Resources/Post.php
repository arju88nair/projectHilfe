<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return ['id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'slug' => $this->slug,
            'gitSource' => $this->gitSource,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),

        ];
    }
}
