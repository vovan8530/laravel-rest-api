<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest {
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
      'description' => ['nullable', 'string'],
      'tagIds' => ['array', 'nullable'],
      'tagIds.*' => ['integer', 'nullable', Rule::exists((new Tag())->getTable(), 'id')],
    ];
  }

  /**
   * @return array|string[]
   */
  public function messages() {
    return [
      'name.required' => 'Name task required!',
    ];
  }
}
