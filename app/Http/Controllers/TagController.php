<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\Actions\TagServiceAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TagController extends Controller {

  /**
   * @var TagServiceAction
   */
  protected TagServiceAction $service;

  /**
   * TagController constructor.
   *
   * @param TagServiceAction $service
   */
  public function __construct(TagServiceAction $service) {
    $this->service = $service;
  }

  /**
   * @return View
   */
  public function index(): View {
    $user = Auth::user();
    $tags = $user->tags()->get();

    return view('tags.index', ['tags' => $tags]);
  }

  /**
   * @param Tag $tag
   * @return View
   */
  public function show(Tag $tag): View {
    $tag->load('tasks');

    return view('tags.show', ['tag' => $tag]);
  }

  /**
   * @return View
   */
  public function create(): View {
    $user = Auth::user();
    $tasks = $user->tasks()->get();

    return view('tags.create', ['tasks' => $tasks]);
  }

  /**
   * @param TagRequest $request
   * @param Tag $tag
   * @return RedirectResponse
   */
  public function store(TagRequest $request, Tag $tag): RedirectResponse {
    $this->service->createTask($request, $tag);

    return redirect()->route('tags')
      ->with(['message' => 'Tag save.', 'class' => 'success']);
  }
}
