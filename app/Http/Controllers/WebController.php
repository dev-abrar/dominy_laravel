<?php

namespace App\Http\Controllers;

use App\Models\WebContent;
use Illuminate\Http\Request;

class WebController extends Controller
{
    function edit_web_contents()
    {
        return view('pages.dashboard.web_content');
    }

    function get_web_content()
    {
        $content = WebContent::where('id', 1)->first();
        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }

    function update_web_content(Request $request)
    {
        $present = WebContent::find($request->id);

        // Handle the logo update
        if ($request->hasFile('logo')) {
            // Delete the old logo if exists
            if ($present->logo != null) {
                $old_logo_path = public_path('upload/logo/' . $present->logo);
                if (file_exists($old_logo_path)) {
                    unlink($old_logo_path);
                }
            }

            // Upload the new logo
            $logo = $request->file('logo');
            $logo_name = $logo->getClientOriginalName();
            $logo->move(public_path('upload/logo'), $logo_name);

            // Update logo field in the database
            WebContent::find($request->id)->update([
                'logo' => $logo_name,
            ]);
        }

        // Handle the about image update
        if ($request->hasFile('ab_img')) {
            // Delete the old about image if exists
            if ($present->ab_img != null) {
                $old_ab_img_path = public_path('upload/about/' . $present->ab_img);
                if (file_exists($old_ab_img_path)) {
                    unlink($old_ab_img_path);
                }
            }

            // Upload the new about image
            $ab_img = $request->file('ab_img');
            $ab_name = $ab_img->getClientOriginalName();
            $ab_img->move(public_path('upload/about'), $ab_name);

            // Update about image field in the database
            WebContent::find($request->id)->update([
                'ab_img' => $ab_name,
            ]);
        }

        // Update the rest of the content
        WebContent::find($request->id)->update([
            'home' => $request->home,
            'ab_content' => $request->ab_content,
            'footer' => $request->footer,
            'number' => $request->number,
            'email' => $request->email,
            'web_link' => $request->web_link,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'address' => $request->address,
            'privacy' => $request->privacy,
        ]);

        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
