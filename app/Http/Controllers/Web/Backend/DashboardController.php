<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    /**
     * Show the layouts page
     */

    public function index() {
        return view('backend.layouts.dashboard.dashboard');
    }
}
