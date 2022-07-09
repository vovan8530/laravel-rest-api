<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller {
  /**
   * @return View
   */
  public function index(): View {
    $user = Auth::user();

    return view('pages.tasks');
  }
}
