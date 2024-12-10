<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\NewsletterController;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',function (){
    if (Auth::check()){
        return redirect()->route('dashboard');
    }else{
        return redirect()->route('login');
    }
})->name('home');
// Route::get('/',[HomeController::class,'index'])->name('home');
// Route::get('/about-us',[HomeController::class,'about'])->name('about');
// Route::get('/available-preceptors',[HomeController::class,'availablePreceptors'])->name('available-preceptors');
// Route::get('/faq-page',[HomeController::class,'faq'])->name('faq.page');
// Route::get('/student-form',[HomeController::class,'studentForm'])->name('student.form');
// Route::get('/become-preceptor',[HomeController::class,'becomePreceptor'])->name('become-preceptor');
// Route::get('/contact-us',[HomeController::class,'contactUs'])->name('conatct-us');
// Route::post('/contact', [HomeController::class, 'send'])->name('contact.send');

// Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


require __DIR__.'/auth.php';
