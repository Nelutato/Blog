<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecepiesResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => Str::limit($this->body, 40),
            'ingridients' => $this->ingridients,
            'user' => UserResource::make($this->user_id)
        ];

        // return parent::toArray($request);
    }
}
