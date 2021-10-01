<?php

namespace App\Http\Controllers;

use App\Models\PageTracker;
use Illuminate\Support\Facades\DB;

class PageTrackController extends Controller
{
    public function setPageTracker(array $params)
    {

        $pageTracker = (new PageTracker())
            ->setUrl($params['url']);

        $pageTracker->save();
    }

    /**
     * @param array $params
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPageTracker(array $params): \Illuminate\Http\JsonResponse
    {
        $data = PageTracker::select('url', DB::raw('count(url) as visit_count,max(created_at) as max_date'))
            ->groupBy('url')->orderByDesc('max_date')->offset($params['page'])->limit($params['per-page'])->get();
        return response()->json(['data' => $data]);
    }

}
