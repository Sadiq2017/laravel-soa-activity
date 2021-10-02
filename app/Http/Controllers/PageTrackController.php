<?php

namespace App\Http\Controllers;

use App\Models\PageTracker;
use App\Utility\Pagination;
use Illuminate\Support\Facades\DB;

class PageTrackController extends Controller
{
    public function setPageTracker(array $params)
    {

        $pageTracker = (new PageTracker())
            ->setUrl($params['url'])
            ->setVisitDate($params['visit_date']);

        $pageTracker->save();
    }

    /**
     * @param array $params
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPageTracker(array $params): \Illuminate\Http\JsonResponse
    {
        $results_per_page = 3;

        $page = $params['page'] ?? 1;

        $paginate = Pagination::paginate(new PageTracker, ['url'], $page, $results_per_page);

        $pageCount = $paginate['pageCount'];

        $page_first_result = $paginate['page_first_result'];

        $data = PageTracker::select('url', DB::raw('count(url) as visit_count,max(visit_date) as last_date'))
            ->groupBy('url')->orderByDesc('last_date')->offset($page_first_result)->limit($results_per_page)->get();

        return response()->json(compact('data', 'pageCount'));
    }

}
