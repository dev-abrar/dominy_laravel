<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortfolioCoontroller;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// frontend work
Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/website', [FrontendController::class, 'website']);
Route::get('/event', [FrontendController::class, 'event']);
Route::get('/works', [FrontendController::class, 'work']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/single-blog/{slug}', [FrontendController::class, 'single_blog']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/privacy-policy', [FrontendController::class, 'privacy']);


// send message
Route::post('/create-message',[MessageController::class, 'create_message']);
Route::post('/create-quote',[MessageController::class, 'create_quote']);

// admin
Auth::routes();
Route::get('/home', [HomeController::class, 'home']);
Route::get('/logout', [HomeController::class, 'logout']);


// all api
Route::get('/get-web-content', [WebController::class, 'get_web_content']);
Route::get('/get-services', [ServiceController::class, 'getServices']);
Route::get('/get-counter', [CounterController::class, 'getCounter']);
Route::get('/get-team', [TeamController::class, 'get_team']);
Route::get('/get-skill', [SkillController::class, 'get_skill']);
Route::get('/get-gallery', [GalleryController::class, 'get_gallery']);
Route::get('/get-testimonial', [TestimonialController::class, 'get_testimonial']);
Route::get('/get-portfolio',[PortfolioCoontroller::class, 'get_portfolio']);
Route::get('/get-client',[ClientController::class, 'get_client']);
Route::get('/get-blog', [BlogController::class, 'get_blog']);
Route::get('/get-seo', [SEOController::class, 'get_seo']);



Route::middleware(['auth'])->group(function(){
    // user
    Route::get('/users', [UserController::class, 'users']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/user-list', [UserController::class, 'user_list']);
    Route::post('/user-create', [UserController::class, 'user_create']);
    Route::post('/user-delete', [UserController::class, 'user_delete']);
    Route::post('/profile-update', [UserController::class, 'profile_update']);
    Route::post('/profile-photo', [UserController::class, 'profile_photo']);
    
    // Website Content
    Route::get('/edit-web-contents', [WebController::class, 'edit_web_contents']);
    Route::post('/update-web-content', [WebController::class, 'update_web_content']);
    

    // service
    Route::get('/service', [ServiceController::class, 'service']);
    Route::get('/getIcon', [ServiceController::class, 'getIcon']);
    Route::post('/service-create', [ServiceController::class, 'service_create']);
    Route::post('/service-delete', [ServiceController::class, 'service_delete']);
    Route::post('/service-update', [ServiceController::class, 'service_update']);
    
    // cunter
    Route::get('/counter', [CounterController::class, 'counter']);
    Route::post('/counter-create', [CounterController::class, 'counter_create']);
    Route::post('/counter-delete', [CounterController::class, 'counter_delete']);
    Route::post('/counter-update', [CounterController::class, 'counter_update']);
    
    // team
    Route::get('/team', [TeamController::class, 'team']);
    Route::post('/team-create', [TeamController::class, 'team_create']);
    Route::post('/team-delete', [TeamController::class, 'team_delete']);
    Route::post('/team-update', [TeamController::class, 'team_update']);
    
    // team skills
    Route::get('/team/{id}/add-skills', [SkillController::class, 'skills']);
    Route::post('/skill-create', [SkillController::class, 'skill_create']);
    Route::post('/skill-delete', [SkillController::class, 'skill_delete']);
    
    // gallery
    Route::get('/gallery', [GalleryController::class, 'gallery']);
    Route::post('/gallery-create', [GalleryController::class, 'gallery_create']);
    Route::post('/gallery-delete', [GalleryController::class, 'gallery_delete']);

    // testimonial
    Route::get('/testimonial',[TestimonialController::class, 'testimonial']);
    Route::post('/testimonial-create', [TestimonialController::class, 'testimonial_create']);
    Route::post('/delete-testimonial', [TestimonialController::class, 'delete_testimonial']);

    // portfolio
    Route::get('/portfolio-page',[PortfolioCoontroller::class, 'portfolio']);
    Route::post('/create-portfolio',[PortfolioCoontroller::class, 'create_portfolio']);
    Route::post('/delete-portfolio', [PortfolioCoontroller::class, 'delete_portfolio']);

    // client
    Route::get('/client',[ClientController::class, 'client']);
    Route::post('/create-client',[ClientController::class, 'create_client']);
    Route::post('/delete-client', [ClientController::class, 'delete_client']);

    // blog
    Route::get('/add-blog', [BlogController::class, 'add_blog']);
    Route::post('/blog-create', [BlogController::class, 'blog_create']);
    Route::post('/blog-delete', [BlogController::class, 'blog_delete']);
    Route::post('/blog-update', [BlogController::class, 'blog_update']);

    // seo
    Route::get('/add-seo', [SEOController::class, 'add_seo']);
    Route::post('/seo-create', [SEOController::class, 'seo_create']);
    Route::post('/seo-delete', [SEOController::class, 'seo_delete']);
    Route::post('/seo-update', [SEOController::class, 'seo_update']);
    
    // message
    Route::get('/messages',[MessageController::class, 'message']);
    Route::get('/get-message',[MessageController::class, 'get_message']);
    Route::post('/delete-message', [MessageController::class, 'delete_message']);
    Route::get('/message/{message_id}/reply', [MessageController::class, 'reply_message']);
    Route::post('/reply-message', [MessageController::class, 'update_message']);
    
    // quote
    Route::get('/quote',[MessageController::class, 'quote']);
    Route::get('/get-quote',[MessageController::class, 'get_quote']);
    Route::post('/delete-quote', [MessageController::class, 'delete_quote']);
    Route::get('/quote/{quote_id}/view', [MessageController::class, 'update_quote']);
    Route::post('/view-quote', [MessageController::class, 'update_quote']);
  
});
