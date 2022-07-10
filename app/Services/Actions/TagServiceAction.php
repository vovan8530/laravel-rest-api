<?php

namespace App\Services\Actions;

use Illuminate\Support\Facades\Auth;

class TagServiceAction {

  /**
   * Create and save new Task with Tags
   *
   * @param $request
   * @param $tag
   * @return $this
   */
  public function createTask($request, $tag): self {
    $tag->fill($request->all());
    $tag->user()->associate(Auth::user());
    $taskIds = $this->createTagIds($request);

    $tag->save();
    $tag->tasks()->sync($taskIds);

    return $this;
  }

  /**
   * Create array ids
   *
   * @param $request
   * @return array
   */
  public function createTagIds($request): array{
    $taskIds = ($request->only('taskIds'));
    $result = [];
    array_walk_recursive($taskIds, function ($item, $key) use (&$result) {
      $result[] = $item;
    });

    return $result;
  }
}
