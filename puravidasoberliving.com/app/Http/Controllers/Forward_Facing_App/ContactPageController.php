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

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'firstName' => 'required|min:2|max:255',
    //         'lastName' => 'required|min:2|max:255',
    //         'email' => 'required|email|min:2|max:255',
    //         'country' => 'required',
    //         'phone' => 'required',
    //         'subject' => 'required|min:2|max:255',
    //         'messageContent' => 'required|min:5|max:500',
    //     ]);

    //     $newMessage = new ContactMessage([
    //         'firstName' => $request->input('firstName'),
    //         'lastName' => $request->input('lastName'),
    //         'email' => $request->input('email'),
    //         'country' => $request->input('country'),
    //         'phone' => $request->input('phone'),
    //         'subject' => $request->input('subject'),
    //         'messageContent' => $request->input('messageContent'),
    //         'agreeToPolicies' => $request->input('agreeToPolicies'),
    //     ]);
    //     $newMessage->save();
    //     // ContactMessage::create($request->all());

    //     // $message = 'Message Successfully Sent!';
    //     // $alertType = 'success';

    //     // $notification = array(
    //     //     'message' => $message,
    //     //     'alert-type' => $alertType
    //     // );

    //     // view()->share('title', 'PVSL | Contact Us');
    //     return back();
    // }
}
