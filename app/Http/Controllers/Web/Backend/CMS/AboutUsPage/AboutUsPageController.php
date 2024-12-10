<?php

namespace App\Http\Controllers\Web\Backend\CMS\AboutUsPage;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutUsPageController extends Controller
{
    public function banner()
    {
        $data = CMS::all();
//        return $data;
        return view('backend.layouts.cms.about-us-page.banner', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bannerContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

// Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ];

// Perform the update
        $updated = $data->update($updateData);

// Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    public function mission()
    {
        $data = CMS::all();
//        return $data;
        return view('backend.layouts.cms.about-us-page.mission', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function missionContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

// Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ];



// Perform the update
        $updated = $data->update($updateData);

// Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    public function vision()
    {
        $data = CMS::all();
//        return $data;
        return view('backend.layouts.cms.about-us-page.vision', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function visionContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

// Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ];

// Perform the update
        $updated = $data->update($updateData);

// Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    // /**
    //  * Display the landing page value view with CMS data.
    //  *
    //  * This method retrieves all CMS records and returns the landing page biography view
    //  * with the retrieved data.
    //  *
    //  * @return \Illuminate\View\View The view of the landing page biography.
    //  */
    // public function value()
    // {
    //     $data = CMS::all();
    //     return view('backend.layouts.cms.about-us-page.value', compact('data'));
    // }

    // /**
    //  * Update the landing page biography title, sub_title, button_text, button_url and image.
    //  * Takes input from a form, validates it, and updates the CMS entry.
    //  * Returns a success or error toast message.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function valueContent(Request $request)
    // {
    //     $data = CMS::findOrFail($request->id);

    //     // Update the CMS entry with the new data
    //     $updated = $data->update([
    //         'title'       => $request->title,
    //         'sub_title'   => $request->sub_title,
    //         'description' => $request->description,
    //     ]);

    //     // Return back with a success or error toast message based on the update result

    //     if ($updated) {
    //         return redirect()->back()->with('t-success', 'Data Updated Successfully');
    //     } else {
    //         return redirect()->back()->with('t-error', 'Data update failed!');
    //     }
    // }

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function expertPreceptor()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.expert-preceptor', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function expertPreceptorContent(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function idealPreceptor()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.about-us-page.ideal-preceptor', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function idealPreceptorContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

// Prepare data for update
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ];


// Perform the update
        $updated = $data->update($updateData);

// Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }


    }

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function connectMember()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.connect-member', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connectMemberContent(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function successPreceptor()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.success-preceptor', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function successPreceptorContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }
}
