<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    function testimonial(){
        return view('pages.dashboard.testimonial');
    }

    function testimonial_create(Request $request){
    
        $image = $request->file('image');  
        $extension = $image->getClientOriginalExtension();
        $file_name = substr($request->input('name'), 0, 6). '.' . $extension;
        $image->move(public_path('upload/testimonial'), $file_name);
    
        Testimonial::create([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'desp' => $request->input('desp'),
            'image' => $file_name,
        ]);
    
        return response()->json([
            'status' => 'success', 
            'message' => 'Testimonial added successfully!'
        ]);
    }
    
    function get_testimonial(){
        return Testimonial::all();
    }

    function delete_testimonial(Request $request) {
        $present = Testimonial::find($request->testimonial_id);
        
        if($present && $present->image != null){
            $imagePath = public_path('upload/testimonial/' . $present->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $present->delete(); 
        
        return response()->json([
            'status' => 'success',
        ]);
    }
    
}
