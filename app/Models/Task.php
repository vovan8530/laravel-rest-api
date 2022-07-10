<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Carbon;

/**
 * Class Task
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property integer $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Task $task
 * @property Task[] $tasks
 *
 */
class Task extends Model {
  use HasFactory;

  /**
   * @var string
   */
  protected $table = 'tasks';

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'name',
    'description'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var string[]
   */
  protected $casts = [
    'name' => 'string',
    'description' => 'string',
  ];

  /**
   * Get user from task
   *
   * @return Relation
   */
  public function user(): Relation{
    return $this->belongsTo(User::class);
  }

  /**
   * Get tags from task
   *
   * @return Relation
   */
  public function tags(): Relation {
    return $this->belongsToMany(Tag::class)->withTimestamps();
  }
}
