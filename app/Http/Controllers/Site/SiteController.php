<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\News;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Role\RoleController as RoleFunctions;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Role;
use App\Models\User;

class SiteController extends Controller
{

    public function about(){
        $about = About::find(1);
        return view('Externo.about', compact('about'));
    }

    public function news(){
        $news = News::orderBy('updated_at', 'desc')->paginate(3);
        return view('Externo.news.news', compact('news'));
    }

    public function newsShow($id){
        $news = News::findOrFail($id);
        return view('Externo.news.show', compact('news'));
    }

    public function schedule(){
        $schedules = Schedule::orderBy('updated_at', 'desc')->paginate(3);
        return view('Externo.schedule.schedule', compact('schedules'));
    }

    public function scheduleShow($id){
        $schedule = Schedule::findOrFail($id);
        return view('Externo.schedule.show', compact('schedule'));
    }

    public function team(){
        $allByRole = RoleFunctions::getAllUsesByRole();
        $roles = Role::all();
        return view('Externo.team.team', compact('allByRole', 'roles'));
    }

    public function showMember($id){
        $user = User::findOrFail($id);
        return view('Externo.team.show', compact('user'));
    }

    public function galleries(){
        $galleries = Gallery::orderBy('updated_at', 'desc')->paginate(3);
        return view('Externo.galleries.galleries', compact('galleries'));
    }

    public function showPhotos($id){
        $gallery = Gallery::findOrFail($id);
        return view('Externo.galleries.show', compact('gallery'));
    }



}
