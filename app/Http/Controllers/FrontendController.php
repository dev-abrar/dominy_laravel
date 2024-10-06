<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        return view('pages.frontend.index');
    }

    function about(){
        return view('pages.frontend.about');
    }

    function website(){
        return view('pages.frontend.website');
    }

    function event(){
        return view('pages.frontend.event');
    }

    function work(){
        return view('pages.frontend.work');
    }

    function blog(){
        return view('pages.frontend.blog');
    }

    function single_blog($slug){
        $blog = Blog::where('slug', $slug)->first();
        return view('pages.frontend.single_blog', compact('blog'));
    }

    function contact(){
        return view('pages.frontend.contact');
    }

    function privacy(){
        return view('pages.frontend.privacy');
    }
}
