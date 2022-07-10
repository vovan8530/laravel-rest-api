<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\Actions\TaskServiceAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
   * @return View
   */
  public function index(): View {
    $user = Auth::user();
    $tasks = $user->tasks()->get();

    return view('tasks.index', ['tasks' => $tasks]);
  }

  /**
   * @param Task $task
   * @return View
   */
  public function show(Task $task): View {
    $task->load('tags');

    return view('tasks.show', ['task' => $task]);
  }

  /**
   * @return View
   */
  public function create(): View {
    $user = Auth::user();
    $tags = $user->tags()->get();

    return view('tasks.create', ['tags' => $tags]);
  }

  /**
   * @param TaskRequest $request
   * @param Task $task
   * @return RedirectResponse
   */
  public function store(TaskRequest $request, Task $task): RedirectResponse {
    $this->service->createTask($request, $task);

    return redirect()->route('tasks')
      ->with(['message' => 'Task save.', 'class' => 'success']);
  }
}
