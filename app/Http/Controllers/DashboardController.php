<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        return redirect()->route('bsd-admin.dashboard');
    }

    public function dashboard() {
        return view('bsd-admin.dashboard');
    }
}
