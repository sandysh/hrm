<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Punch as Punch;

use Auth;

use DateTime;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_date = date("Y-m-d"); 

        $data = Punch::where('user_id',Auth::id())->get();
        if($data == [])
        {
        return "step";
        foreach($data as $check)
        {
        if($check->punch_in == '00:00:00' && $check->punched_date == $today_date)
        {
            return view('home')->with('data',$data);            
        }
        else
        {
            return view('punchout'); 
        }
    }
    }
    else
    {
        return view('home')->with('data',$data);
    }
}




}
