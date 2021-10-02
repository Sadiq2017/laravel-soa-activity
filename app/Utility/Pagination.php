<?php

declare(strict_types=1);

namespace App\Utility;

use App\Utility\Contract\PaginationInterface;
use Illuminate\Database\Eloquent\Model;

class Pagination implements PaginationInterface
{

    public static function paginate(Model $model, array $columns = ['*'], int $page = 1, int $perPage = 1): array
    {

        $number_of_result = $model::select($columns)->groupBy($columns)->get()->count();

        $pageCount = ceil($number_of_result / $perPage);

        $page_first_result = ($page - 1) * $perPage;

        return compact('pageCount', 'page_first_result');
    }
}
