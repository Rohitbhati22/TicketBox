<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = Auth::check();
        if($user)
        {
            $user_id = Auth::user()->id;
        }
        $user_id = -1;
        $title = 'Ticket Box';
        $banners = Banner::all();
        $movies = Movie::where('status', 'on')->get();
        return view('home', compact('banners', 'title', 'movies', 'user', 'user_id'));
    }
}
