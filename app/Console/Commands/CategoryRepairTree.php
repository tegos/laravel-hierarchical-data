<?php

namespace App\Console\Commands;

use App\Models\CategoryNode;
use Illuminate\Console\Command;

final class CategoryRepairTree extends Command
{
    protected $signature = 'catalog:repair-category-tree';

    protected $description = 'Repairs and reorders the nested set structure of categories';

    public function handle(): int
    {
        $this->components->task('Repairing category tree structure', function () {
            CategoryNode::fixTree();
        });

        return self::SUCCESS;
    }
}
