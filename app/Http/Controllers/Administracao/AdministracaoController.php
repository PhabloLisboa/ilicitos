<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\News;
use App\Models\Piece;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministracaoController extends Controller
{
    public function index()
    {
        $news = News::all()->reverse();
        $schedule = Schedule::all()->reverse();
        $pieces = Piece::all();
        $team = User::all();

        switch(Auth::user()->sys_role_id){
            case 1:
                return view('Interno.adm.index', compact('news', 'schedule', 'pieces', 'team'));
            case 2:
                return Auth::user()->avatar;
            default:
                return Auth::user()->avatar;
        }
    }
}
