<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\FAQController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\ContactUsController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\CustomScriptController;
use App\Http\Controllers\Web\Backend\NewsletterListController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\DynamicPageController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\ValueController;
use App\Http\Controllers\Web\Backend\Settings\StripeSettingController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\ProcessController;
use App\Http\Controllers\Web\Backend\CMS\AboutUsPage\AboutUsPageController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\LandingPageController;
use App\Http\Controllers\Web\Backend\CMS\LandingPage\SuccessGuideController;
use App\Http\Controllers\Web\Backend\CMS\ContactUsPage\ContactUsPageController;
use App\Http\Controllers\Web\Backend\ServiceController;
use App\Http\Controllers\Web\Backend\ProjectController;
use App\Http\Controllers\Web\Backend\PortfolioController;

Route::middleware('auth')->group(function () {

    // Route For services
 Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ServiceController::class, 'update'])->name('services.update'); 
Route::delete('/destroy/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

 // Route For Projects

Route::get('/projects-list', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/create-project', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/update-project/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/remove-project/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');


 // Route For Portfolio
 Route::get('/get-all-portfolio', [PortfolioController::class, 'index'])->name('portfolios.index');
 Route::get('/create-portfolio', [PortfolioController::class, 'create'])->name('portfolios.create');
 Route::post('/store-portfolio', [PortfolioController::class, 'store'])->name('portfolios.store');
 Route::get('/update-portfolio/{id}', [PortfolioController::class, 'edit'])->name('portfolios.edit');
 Route::put('/update-portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolios.update');
 Route::delete('/delete-portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');




Route::get('/creativity', [ServiceController::class, 'index'])->name('creativity.index');
Route::get('/contracts', [ServiceController::class, 'index'])->name('cms.contact');




    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //! Route for SystemSettingController
    Route::get('/system-setting', [SystemSettingController::class, 'index'])->name('system.index');
    Route::post('/system-setting/update', [SystemSettingController::class, 'update'])->name('system.update');

    //! Route for ProfileController
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.setting');
    Route::post('/update-profile', [ProfileController::class, 'UpdateProfile'])->name('update.profile');
    Route::post('/update-profile-password', [ProfileController::class, 'UpdatePassword'])->name('update.Password');

    //! Route for MailSettingController
    Route::get('/mail-setting', [MailSettingController::class, 'index'])->name('mail.setting');
    Route::post('/mail-setting', [MailSettingController::class, 'update'])->name('mail.update');

    //!Route for DynamicPageController
    Route::get('/dynamic-page', [DynamicPageController::class, 'index'])->name('dynamic_page.index');
    Route::get('/dynamic-page/create', [DynamicPageController::class, 'create'])->name('dynamic_page.create');
    Route::post('/dynamic-page/store', [DynamicPageController::class, 'store'])->name('dynamic_page.store');
    Route::get('/dynamic-page/edit/{id}', [DynamicPageController::class, 'edit'])->name('dynamic_page.edit');
    Route::post('/dynamic-page/update/{id}', [DynamicPageController::class, 'update'])->name('dynamic_page.update');
    Route::delete('/dynamic-page/delete/{id}', [DynamicPageController::class, 'destroy'])->name('dynamic_page.destroy');
    Route::get('/dynamic-page/status/{id}', [DynamicPageController::class, 'status'])->name('dynamic_page.status');

    //! Route for StripeSettingController
    Route::get('/stripe-setting', [StripeSettingController::class, 'index'])->name('stripe.index');
    Route::post('/stripe-setting', [StripeSettingController::class, 'update'])->name('stripe.update');

    //!Route for GallaryImageController for Landing page
   
    // Route for Process Controller

    // Route for Services
   







  

    // Route for Faq Controller
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::get('/faq/status/{id}', [FaqController::class, 'status'])->name('faq.status');


  

    Route::controller(AboutUsPageController::class)->group(function () {
        Route::get('/cms/about-page/banner', 'banner')->name('cms.about-page.banner');
        Route::patch('/cms/about-page/banner', 'bannerContent')->name('cms.about-page.banner.update');
        Route::get('/cms/about-page/mission', 'mission')->name('cms.about-page.mission');
        Route::patch('/cms/about-page/mission', 'missionContent')->name('cms.about-page.mission.update');
        Route::get('/cms/about-page/vision', 'vision')->name('cms.about-page.vision');
        Route::patch('/cms/about-page/vision', 'visionContent')->name('cms.about-page.vision.update');
        // Route::get('/cms/about-page/value', 'value')->name('cms.about-page.value');
        // Route::patch('/cms/about-page/value', 'valueContent')->name('cms.about-page.value.update');
        Route::get('/cms/about-page/ideal-preceptor', 'idealPreceptor')->name('cms.about-page.ideal-preceptor');
        Route::patch('/cms/about-page/ideal-preceptor', 'idealPreceptorContent')->name('cms.about-page.ideal-preceptor.update');
        Route::get('/cms/landing-page/connect-member', 'connectMember')->name('cms.landing-page.connect-member');
        Route::patch('/cms/landing-page/connect-member', 'connectMemberContent')->name('cms.landing-page.connect-member.update');
        Route::get('/cms/landing-page/success-preceptor', 'successPreceptor')->name('cms.landing-page.success-preceptor');
        Route::patch('/cms/landing-page/success-preceptor', 'successPreceptorContent')->name('cms.landing-page.success-preceptor.update');
    });

 

    //!Route for ContactUsController
    Route::controller(ContactUsController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact.index');
        Route::delete('/contact/destroy/{id}', 'destroy')->name('contact.destroy');
    });
    //!Route for NewsletterListController
    Route::controller(NewsletterListController::class)->group(function () {
        Route::get('/newsletter', 'index')->name('newsletter.index');
        Route::delete('/newsletter/destroy/{id}', 'destroy')->name('newsletter.destroy');
    });
});
