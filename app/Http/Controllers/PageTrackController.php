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

    public function getPageTracker()
    {
        $data = PageTracker::select('url', DB::raw('count(url) as visit_count,max(created_at) as max_date'))
            ->groupBy('url')->orderByDesc('max_date')->paginate(10);

        return $data;
    }

}
