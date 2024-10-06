<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    function counter(){
        return view('pages.dashboard.counter');
    }

    function counter_create(Request $request){
        Counter::create([
            'title'=>$request->title,
            'number'=>$request->number,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Counter Added Successfull!',
        ]);
    }

    function getCounter(){
        return Counter::all();
    }

    function counter_delete(Request $request){
        Counter::find($request->counter_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    function counter_update(Request $request){
        Counter::find($request->counter_id)->update([
            'title'=>$request->title,
            'number'=>$request->number,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Counter updated successfull!',
        ]);
    }
}
