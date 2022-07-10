<?php

namespace App\Services\Actions;

use Illuminate\Support\Facades\Auth;

class TaskServiceAction {

  /**
   * Create and save new Task with Tags
   *
   * @param $request
   * @param $task
   * @return $this
   */
  public function createTask($request, $task): self {
    $task->fill($request->all());
    $task->user()->associate(Auth::user());
    $tagIds = $this->createTagIds($request);

    $task->save();
    $task->tags()->sync($tagIds);

    return $this;
  }

  /**
   * Create array ids
   *
   * @param $request
   * @return array
   */
  public function createTagIds($request): array{
    $tagIds = ($request->only('tagIds'));
    $result = [];
    array_walk_recursive($tagIds, function ($item, $key) use (&$result) {
      $result[] = $item;
    });

    return $result;
  }
}
