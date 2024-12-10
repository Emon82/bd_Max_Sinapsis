<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\CMS;
use App\Models\FAQ;
use App\Models\Value;
use App\Models\Contact;
use App\Models\Process;
use App\Models\ContactCMS;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\ClinicalRotation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $cms = CMS::get();

       //$processes =  Process::get();
       $processes =  Process::where('status','active')->get();
       $successGuides = ClinicalRotation::where('status','active')->get();
       $ourValues = Value::where('status','active')->get();
       $faqs = Faq::where('status','active')->get();


        return view('frontend.layouts.home', compact('cms','processes','successGuides','faqs','ourValues'));
    }

    public function about()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status','active')->get();
       $ourValues = Value::where('status','active')->get();
        return view('frontend.layouts.about_us', compact('cms','faqs','ourValues'));
    }

    public function availablePreceptors()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status','active')->get();
        return view('frontend.layouts.available-preceptor', compact('cms','faqs'));
    }

    public function faq()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status','active')->get();
        return view('frontend.layouts.faq', compact('cms','faqs'));
    }

    public function studentForm()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status','active')->get();
        $studentCms = ContactCMS::get();
        return view('frontend.layouts.student-form', compact('cms','faqs','studentCms'));
    }

    public function becomePreceptor()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status','active')->get();
        $studentCms = ContactCMS::get();
        return view('frontend.layouts.become-preceptor', compact('cms','faqs','studentCms'));
    }
    public function contactUs()
    {
        $studentCms = ContactCMS::get();
        $faqs = Faq::where('status','active')->get();
        return view('frontend.layouts.contact-us', compact('studentCms','faqs'));
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);


        try {
            // Save the data to the database
            Contact::create($data);

            // Send the email
            Mail::to('admin@gmail.com')->send(new ContactFormMail($data));

            return redirect()->back()->with('t-success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Message sending failed. Please try again later.');
        }

    }
}
