<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Piece;
use App\Models\Schedule;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::all()->reverse();
        $schedule = Schedule::all()->reverse();
        $pieces = Piece::all();
        $team = User::all();
        $galleries = Gallery::all();
        return view('Externo.home', compact('news', 'schedule', 'pieces', 'team', 'galleries'));
    }
}
