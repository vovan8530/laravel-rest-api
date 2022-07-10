<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules() {
    return [
      'name' => ['required', 'string', 'max:255'],
      'taskIds' => ['array', 'nullable'],
      'taskIds.*' => ['integer', 'nullable', Rule::exists((new Task())->getTable(), 'id')],
    ];
  }

  /**
   * @return array|string[]
   */
  public function messages() {
    return [
      'name.required' => 'Name tag required!',
    ];
  }
}
