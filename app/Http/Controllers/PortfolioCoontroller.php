<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioCoontroller extends Controller
{
    function portfolio(){
        return view('pages.dashboard.portfolio');
    }

    function create_portfolio(Request $request){
    
        $image = $request->file('image');  
        $extension = $image->getClientOriginalExtension();
        $file_name = substr($request->input('title'), 0, 6) . '.' . $extension;
        $image->move(public_path('upload/portfolio'), $file_name);
    
        Portfolio::create([
            'title' => $request->input('title'),
            'desp' => $request->input('desp'),
            'image' => $file_name,
        ]);
    
        return response()->json([
            'status' => 'success', 
            'message' => 'Portfolio added successfully!'
        ]);
    }


    function get_portfolio(){
        return Portfolio::all();
    }

    function delete_portfolio(Request $request) {
        $present = Portfolio::find($request->portfolio_id);
        
        if ($present) {
            if ($present->image != null) {
                $imagePath = public_path('upload/portfolio/' . $present->image);
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
    
}
