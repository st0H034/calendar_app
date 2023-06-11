<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Schedule;



class ScheduleController extends Controller
{
    public function store(Request $request){
        $Schedule = new Schedule;
        $Schedule->id = $request->id;
        $Schedule->title = $request->title;
        $Schedule->start_date = $request->start;
        $Schedule->end_date = $request->end;

        $Schedule->save();

        return to_route('calendar');
    }

    //public function get (Request $request){

    //}
}
