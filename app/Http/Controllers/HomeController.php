<?php

namespace App\Http\Controllers;

use App\Events\EventNotify;
use App\Events\Notify;
use Illuminate\Console\Scheduling\Event as SchedulingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //event(new EventNotify('hello'));
        return view('home');
    }
    public function send(Request $request)
    {

        //lravel image uplode
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/chat');
            $image->move($destinationPath, $name);
        $message = [
            'auth'=>Auth::user(),
            'user' => Auth::user(),
            'message' => $request->messege,
            'image' => $name,
        ];
        }else{
        $message = [
            'auth'=>Auth::user(),
            'user' => Auth::user(),
            'message' => $request->messege,
        ];
        }
        event(new EventNotify($message));
        echo "messege send";
    }
    public function auth(Request $request)
    {
    //return json
     return response()->json(Auth::user());
    }


    public function index1()
    {
        // event(new Notify('hey how are You'));
        return view('home2');
    }
}
