<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Movie;
use \App\Models\Screening;
use \App\Models\Temp_ticket;
use \App\Models\Seat;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index($slug)
    {
        $user = Auth::check();
        $movie = Movie::where('status', 'on')->where('slug', $slug)->first();
        $title = $movie->title;
        return view('movie', compact('movie', 'title', 'user'));
    }

     public function indexRunningMovies()
    {
         $user = Auth::check();
        $movies = Movie::where('status', 'on')->get();
        $title = "Currently Running Movies";
        return view('movies', compact('movies', 'title', 'user'));
    }

      
    public function showScreenings($movie_id)
    {
        $user = Auth::check();
        $screens = Screening::where('movie_id', $movie_id)->where('status', 'on')->get();
        $movie = Movie::where('movie_id', $movie_id)->first();
        $title = $movie->title;
        return view('screeing', compact('movie', 'title', 'screens', 'user'));
    }

    public function showBooking($movie_id, $screening_id)
    {
        $user = Auth::check();
        $seats = Seat::where('screening_id', $screening_id)->get();
        $temp_seats = Temp_ticket::where('screening_id', $screening_id)
        ->where('user_id', Auth::user()->id)->get();
        $screening = Screening::where('screening_id', $screening_id)->first();
        $movie = Movie::where('movie_id', $movie_id)->first();
        $title = $movie->title . " " . $screening->start_time . " To " . $screening->end_time;
        return
         view('book', compact('movie', 'title', 'seats', 'user', 'temp_seats', 'movie_id', 'screening_id'));
    }
    public function showBooked($movie_id, $screening_id)
    {
        $user = Auth::check();
        $temp_seats = Temp_ticket::where('screening_id', $screening_id)
        ->where('user_id', Auth::user()->id)->get();

        foreach ($temp_seats as $temp_seat) {
            Seat::where('seat_id', $temp_seat->seat_id)
       ->update([
           'IsBook' => 1,
           'user_id' => Auth::user()->id
        ]);

        $temp_s_d = Temp_ticket::where('seat_id', $temp_seat->seat_id)
        ->where('screening_id', $screening_id)
        ->delete();
        }
    
        $seats = Seat::where('screening_id', $screening_id)->where('user_id', Auth::user()->id)->get();

        $screening = Screening::where('screening_id', $screening_id)->first();

        $movie = Movie::where('movie_id', $movie_id)->first();

        $title = "Thank You";

        return view('booked', compact('movie', 'title', 'seats', 'screening', 'user'));
    }

     public function AddScreening($movie_id, $start_time, $end_time, $date)
    {
        $title = "Book";
        $screening = new Screening;
        $screening->movie_id = $movie_id;
        $screening->start_time = $start_time;
        $screening->end_time = $end_time;
        $screening->date = $date;
        $screening->save();
        $screening_f = Screening::where('movie_id', $movie_id)->where('start_time', $start_time)->where('end_time', $end_time)->where('date', $date)->first();
        for ($i=1; $i<=50; $i++)
        {
        $seat = new Seat;
        $seat->screening_id = $screening_f->screening_id;
        $seat->seat_number = $i;
        $seat->save();
        }
        return view('welcome', compact('title'));
    } 


    public function deleteTempBooking(Request $request, $movie_id, $screening_id)
    {
        $user = Auth::check();
        if($user)
        {
        $temp = Temp_ticket::where('seat_id', $request->seat_id)
        ->where('screening_id', $screening_id)
        ->where('user_id', Auth::user()->id)
        ->delete();
 return 1;
        }
        
        return -1;
    }

     public function addTempBooking(Request $request, $movie_id, $screening_id)
    {
        $user = Auth::check();
        if($user)
        {
            $Is_temp_book = Temp_ticket::where('seat_id', $request->seat_id)
        ->where('screening_id', $screening_id)
        ->where('user_id', Auth::user()->id)->first();
        if(!$Is_temp_book)
        {
 $temp = new Temp_ticket;
        $temp->seat_id = $request->seat_id;
        $temp->screening_id = $screening_id;
        $temp->user_id = Auth::user()->id;
        $temp->save();
         return response(2);
        }
        else {
              $temp = Temp_ticket::where('seat_id', $request->seat_id)
        ->where('screening_id', $screening_id)
        ->where('user_id', Auth::user()->id)
        ->delete();
         return response(1);
        }
        }
        
        return response(-1);
    }
}
