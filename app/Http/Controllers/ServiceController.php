<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function service()
    {
        return view('pages.dashboard.service');
    }
    function getIcon()
    {
        $fonts = array(
            'fa-brands fa-react',
            'fa-solid fa-desktop',
            'fa-regular fa-lightbulb',
            'fa-brands fa-free-code-camp',
            'fa-solid fa-headset',
            'fa-solid fa-pen-to-square',
        );

        return response()->json($fonts);
    }

    function service_create(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'desp' => 'required',
        ]);
        Service::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'desp' => $request->desp,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Service added successful',
        ]);
    }

    public function getServices()
    {
        return $services = Service::all();  // Assuming you have a Service model
        
    }

    function service_delete(Request $request){
        Service::find($request->service_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    function service_update(Request $request){
        Service::find($request->service_id)->update([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'desp'=>$request->desp,
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Service updated Successfull',
        ]);
    }
}
