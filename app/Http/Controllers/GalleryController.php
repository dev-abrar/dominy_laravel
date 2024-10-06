<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function gallery(){
        return view('pages.dashboard.gallery');
    }

    function get_gallery(){
        return Gallery::all();
    }

    function gallery_create(Request $request){
        $random = rand(100, 999);
        $preview = $request->file('preview');
        $extension = $preview->getClientOriginalExtension();
        $preview_name = $request->class.$random.'.'.$extension;
        $preview->move(public_path('upload/gallery/preview'), $preview_name);

        $gallery = $request->file('gallery');
        $extension2 = $gallery->getClientOriginalExtension();
        $gallery_name = $request->class.$random.'.'.$extension2;
        $gallery->move(public_path('upload/gallery/gal'), $gallery_name);

        Gallery::create([
            'class'=>$request->class,
            'preview'=>$preview_name,
            'gallery'=>$gallery_name,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Gallery added Successful!',
        ]);
    }
    
    function gallery_delete(Request $request){
        $present = Gallery::find($request->gal_id);
        if($present->preview != null){
            unlink(public_path('upload/gallery/preview/'.$present->preview));
        }
        if($present->gallery != null){
            unlink(public_path('upload/gallery/gal/'.$present->gallery));
        }

        Gallery::find($request->gal_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
   
}
