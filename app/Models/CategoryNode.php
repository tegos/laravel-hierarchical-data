<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static> withDepth(string $as = 'depth')
 */
final class CategoryNode extends Model
{
    use NodeTrait;

    protected $table = 'categories';
}
