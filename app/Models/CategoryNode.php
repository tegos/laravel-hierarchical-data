<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

final class CategoryNode extends Model
{
    use NodeTrait;

    protected $table = 'categories';
}
