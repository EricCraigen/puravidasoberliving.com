<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboardHome()
    {
        view()->share('title', 'PVSL | Dashboard Home');
        return view("dashboard.dashboard-home");
    }

    public function getUserManagement()
    {
        view()->share('title', 'PVSL | User Management');
        return view("dashboard.user-management");
    }
}