<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request) {
    /* @var Task|self $this */
    return [
      'id' => $this->id,

      'name' => $this->name,
      'description' => $this->description,

      'userId' => $this->user_id,
      'tags' => TagResource::collection($this->whenLoaded('tags'))
    ];

  }
}
