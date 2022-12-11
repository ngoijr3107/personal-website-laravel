<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index() {
        $title = "Dashboard";
        $project_count = Project::count();
        $service_count = Service::count();

        return view('admin.dashboard', [
            'title' => $title,
            'project_count' => $project_count,
            'service_count' => $service_count
        ]);
    }

    public function logout() {
        Auth::logout();
        toast('You are now logged out!', 'success');

        return redirect('/login');
    }
}
