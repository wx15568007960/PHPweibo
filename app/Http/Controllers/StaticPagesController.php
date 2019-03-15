<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        if (!Auth::check()) {
            return $this->all();
        }

        $statuses = Auth::user()->feed()->paginate($this->pagesize());

        return view('static_pages/home', compact('statuses'));
    }

    public function all()
    {
        $statuses = Status::with('user')->orderBy('created_at', 'desc')
                            ->paginate($this->pagesize());

        return view('static_pages/home', compact('statuses'));
    }

    public function help()
    {
        $content = parse_markdown('sites/help');

        return view('static_pages/help', compact('content'));
    }

    public function about()
    {
        $content = parse_markdown('sites/about');

        return view('static_pages/about', compact('content'));
    }
}
