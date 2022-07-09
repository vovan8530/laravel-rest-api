<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

  /**
   * Create an authenticated for api
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function login(Request $request): JsonResponse {
    if (Auth::attempt($request->toArray())) {

      /* @var User $user */
      $user = $request->user();

      $token = $user->createToken('web-token')->plainTextToken;

      return response()->json([
        'user' => $user,
        'token' => $token,
      ], Response::HTTP_OK);
    }

    return response()->json([
      'message' => 'Invalid credentials'
    ], Response::HTTP_UNPROCESSABLE_ENTITY);

  }


  /**
   * Destroy an authenticated for api
   *
   * @return JsonResponse
   */
  public function logout(): JsonResponse {
    Auth::user()->tokens()->delete();

    return response()->json([
      'message' => 'success'
    ], Response::HTTP_OK);
  }
}
