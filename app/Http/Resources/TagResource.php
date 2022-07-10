<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request) {
    /* @var Tag|self $this */
    return [
      'id' => $this->id,
      'name' => $this->name,
      'userId' => $this->user_id,

      'tags' => TaskResource::collection($this->whenLoaded('tasks'))
    ];
  }
}
