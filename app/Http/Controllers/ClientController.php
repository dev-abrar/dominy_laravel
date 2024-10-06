<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function client(){
        return view('pages.dashboard.client');
    }

    function create_client(Request $request){
    
        $image = $request->file('logo');  
        $file_name = $image->getClientOriginalName();
        $image->move(public_path('upload/client'), $file_name);
    
        Client::create([
            'logo' => $file_name,
        ]);
    
        return response()->json([
            'status' => 'success', 
            'message' => 'Client added successfully!'
        ]);
    }


    function get_client(){
        return Client::all();
    }

    function delete_client(Request $request) {
        $present = Client::find($request->client_id);
        
        if ($present) {
            if ($present->logo != null) {
                $imagePath = public_path('upload/client/' . $present->logo);
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
