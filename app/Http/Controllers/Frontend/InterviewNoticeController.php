<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\InterviewNotice;
use Illuminate\Http\Request;

class InterviewNoticeController extends Controller
{
    public function index()
    {
        $notices = InterviewNotice::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.interview-notices.index', compact('notices'));
    }
}
