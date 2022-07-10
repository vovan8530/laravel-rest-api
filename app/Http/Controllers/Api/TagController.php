<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Services\Actions\TagServiceAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller {

  /**
   * @var TagServiceAction
   */
  protected TagServiceAction $service;

  /**
   * TaskController constructor.
   *
   * @param TagServiceAction $service
   */
  public function __construct(TagServiceAction $service) {
    $this->service = $service;
  }

  /**
   * @return AnonymousResourceCollection
   */
  public function index(): AnonymousResourceCollection {
    $user = Auth::user();

    return TagResource::collection(
      $user->tags()->get()
    );
  }

  /**
   * @param Tag $tag
   * @return TagResource
   */
  public function show(Tag $tag): TagResource {
    $tag->load('tasks');
    TagResource::withoutWrapping();

    return new TagResource($tag);
  }

  /**
   * @param TagRequest $request
   * @param Tag $tag
   * @return JsonResponse
   */
  public function store(TagRequest $request, Tag $tag): JsonResponse {
    $this->service->createTask($request, $tag);
    return response()->json([
      'status' => 'created',
      'data' => $this->show($tag)
    ]);
  }
}
