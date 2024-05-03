<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validated)
 * @method static findOrfail(string $id)
 * @method static paginate()
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'body',
      'user_id'
    ];
}
