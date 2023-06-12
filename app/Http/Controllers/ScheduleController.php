<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Schedule;



class ScheduleController extends Controller
{
    public function store(Request $request){
        $Schedule = new Schedule;
        $Schedule->title = $request->input('title');
        $Schedule->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $Schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);

        $Schedule->save();
    }

    public function get (Request $request){

        // Calendar.vueから送られてきたカレンダーの表示範囲を取得
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 登録処理
        return Schedule::query()
            ->select([
                // FullCalendarの形式に合わせる
                'id',
                'start_date as start',
                'end_date as end',
                'title as title',
            ])
            // FullCalendarの表示範囲のみ取得
            ->where('start_date', '>', $start_date)
            ->where('end_date', '<', $end_date)
            ->get();
    }

    public function delete (Request $request){

        // Calendar.vueから送られてきたイベントのidを取得
        $id = $request->input('id');

        Schedule::where('id', $id)->delete();
    }
}