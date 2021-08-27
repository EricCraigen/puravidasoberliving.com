<?php

namespace App\Http\Controllers\Forward_Facing_App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
    public function getWelcomePage()
    {
        view()->share('title', 'PVSL | Pura Vida Sober Living');
        return view("welcome");
    }

    public function getMissionPage()
    {
        view()->share('title', 'PVSL | Our Mission');
        return view("Forward_Facing_App.mission");
    }

    public function getALaCarteRecoveryPage()
    {
        view()->share('title', 'PVSL | À La Carte Recovery');
        return view("Forward_Facing_App.about");
    }
}
