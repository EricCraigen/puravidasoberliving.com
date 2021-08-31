<?php

namespace App\Http\Controllers\Forward_Facing_App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalApplicationController extends Controller
{
    public function getRentalApplicationPage()
    {
        view()->share('title', 'PVSL | Apply Now');
        return view("Forward_Facing_App.application.application-page");
    }

    public function getRentalApplicationStepOne()
    {
        view()->share('title', 'PVSL | Application - Step One');
        return view("Forward_Facing_app.application.steps.application-step-one");
    }

    public function getRentalApplicationStepTwo()
    {
        view()->share('title', 'PVSL | Application - Step Two');
        return view("Forward_Facing_app.application.steps.application-step-two");
    }

    public function getRentalApplicationStepThree()
    {
        view()->share('title', 'PVSL | Application - Step Three');
        return view("Forward_Facing_app.application.steps.application-step-Three");
    }
}
