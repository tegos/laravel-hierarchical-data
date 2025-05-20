<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];
}
