<?php

namespace App\Http\Controllers\Forward_Facing_App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactPageController extends Controller
{
    public function getContactUsPage()
    {
        view()->share('title', 'PVSL | Contact Us');
        return view("Forward_Facing_App.contact");
    }

}
