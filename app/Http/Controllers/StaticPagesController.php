<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StaticPagesController extends Controller
{
    public function home()
    {
        $statuses = Status::orderBy('created_at', 'desc')
                            ->paginate(10);

        return view('static_pages/home', compact('statuses'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
