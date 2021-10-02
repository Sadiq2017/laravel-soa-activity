<?php

declare(strict_types=1);

namespace App\Utility\Contract;

use Illuminate\Database\Eloquent\Model;

interface PaginationInterface
{
    public static function paginate(Model $model,array $columns=['*'],int $page=1,int $perPage=1): array;
}
