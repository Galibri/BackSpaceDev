<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        // Handle projects details
        $projects_completed = Project::whereStatus(1)->get();

        return redirect()->route('bsd-admin.dashboard');
    }

    public function dashboard() {
        $earned_this_month = Project::whereBetween('end_date', [date('Y-m-01'), date("Y-m-t", strtotime(date('Y-m-d')))])->whereStatus(1)->sum('estimated_amount');
        $earned_lifetime = Project::whereStatus(1)->sum('estimated_amount');
        $upcoming_earning = Project::whereStatus(0)->sum('estimated_amount');
        $earned_this_year = Project::whereBetween('end_date', [date('Y-01-01'), date("Y-12-31")])->whereStatus(1)->sum('estimated_amount');

        $completed_projects_lifetime = Project::whereStatus(1)->count();
        $completed_projects_this_month = Project::whereBetween('end_date', [date('Y-m-01'), date("Y-m-t", strtotime(date('Y-m-d')))])->whereStatus(1)->count();
        $completed_projects_this_year = Project::whereBetween('end_date', [date('Y-01-01'), date("Y-12-31", strtotime(date('Y-m-d')))])->whereStatus(1)->count();
        $processing_projects = Project::whereStatus(0)->count();

        return view('bsd-admin.dashboard', compact('earned_this_month', 'earned_this_year', 'earned_lifetime', 'upcoming_earning', 'completed_projects_lifetime', 'completed_projects_this_month', 'completed_projects_this_year', 'processing_projects'));
    }
}