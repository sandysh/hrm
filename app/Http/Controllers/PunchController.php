<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Punch as Punch;

use Carbon;

use Auth;

use DateTime;

class PunchController extends Controller
{
    
    public function store(Request $request)
    {   
        $punch = new Punch;
        $mytime = Carbon\Carbon::now()->format('H:i:s');
        $mydate = Carbon\Carbon::now()->format('Y-m-d');
        $punch->user_id = Auth::id();

        $data = Punch::where('punch_date',$mydate)->where('user_id',Auth::id())->first();
        if($data)
        {
        if($data->punch_in == '00:00:00')
        {
            $punch->punch_note = $request->punch_note;
            $punch->punch_in = $mytime;
            $punch->punch_date = $mydate;
            $punch->save();
            return redirect()->to('/punchView');        
        }

        else
        {
            $request->session()->flash('warning', 'You have already punched in for today');
            return redirect()->to('/punchView');
        }

        }

        else
        {
           $punch->punch_note = $request->punch_note;
           $punch->punch_in = $mytime;
           $punch->punch_date = $mydate;
           $punch->save();
           $request->session()->flash('warning', 'You have been punched in for today');
           return redirect()->to('/punchView');         
        }
    }

    public function showPunchView()
    {
        return view('punchout');
    }

    public function punchout(Request $request)
    {
        $today_date = Carbon\Carbon::now()->format('Y-m-d');
        $punch_out = Carbon\Carbon::now()->format('H:i:s');
        $data = Punch::where('punch_date',$today_date)->where('user_id',Auth::id())->first();
        if($data->punch_out == '00:00:00')
        {
           $punch =  Punch::find($data->id);
           $punch->punch_out =  $punch_out;

           // Counting total punch hours
            $in = new DateTime($data->punch_in);
            $out = new DateTime($punch_out);
            $interval = $out->diff($in);
            $total = $interval->format('%i');

            // Getting the punched day

             $timestamp = strtotime($data->punch_date);
             $day = date('D', $timestamp);

           $punch->total_hours = $total;
           $punch->marked_day = $day;
           $punch->save();
           
           $request->session()->flash('warning', 'You punched out safely from the system');
           return redirect()->to('/');
        }

        else
        {
            // return "Already Punched out for today";
            return redirect()->to('/');        
        }
    }

}
