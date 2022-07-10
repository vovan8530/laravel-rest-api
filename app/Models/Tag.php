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
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Tag $tag
 * @property Tag[] $tags
 *
 */
class Tag extends Model {
  use HasFactory;

  /**
   * @var string
   */
  protected $table = 'tags';

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'name',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var string[]
   */
  protected $casts = [
    'name' => 'string',
  ];

  /**
   * Get user from task
   *
   * @return Relation
   */
  public function user(): Relation {
    return $this->belongsTo(User::class);
  }

  /**
   * Get tasks from tag
   *
   * @return Relation
   */
  public function tasks(): Relation {
    return $this->belongsToMany(Task::class)->withTimestamps();
  }
}
