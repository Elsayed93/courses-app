<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category->name,
            'description' => $this->description,
            'rating' => $this->rating,
            'views' => $this->views,
            'levels' => $this->levels,
            'hours' => $this->hours,
            'active' => $this->active,
        ];
    }
}
