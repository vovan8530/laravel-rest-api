<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\Actions\TaskServiceAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {

  /**
   * @var TaskServiceAction
   */
  protected TaskServiceAction $service;

  /**
   * TaskController constructor.
   *
   * @param TaskServiceAction $service
   */
  public function __construct(TaskServiceAction $service) {
    $this->service = $service;
  }

  /**
   * @return AnonymousResourceCollection
   */
  public function index(): AnonymousResourceCollection {
    $user = Auth::user();

    return TaskResource::collection(
      $user->tasks()->get()
    );
  }

  /**
   * @param Task $task
   * @return TaskResource
   */
  public function show(Task $task): TaskResource {
    $task->load('tags');
    TaskResource::withoutWrapping();

    return new TaskResource($task);
  }

  /**
   * @param TaskRequest $request
   * @param Task $task
   * @return JsonResponse
   */
  public function store(TaskRequest $request, Task $task): JsonResponse {
    $this->service->createTask($request, $task);
    return response()->json([
      'status' => 'created',
      'data' => $this->show($task)
    ]);
  }
}
