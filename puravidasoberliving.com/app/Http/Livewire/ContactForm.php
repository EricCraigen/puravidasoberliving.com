<?php

namespace App\Http\Livewire;
// namespace App\Http\Livewire/;
// namespace App\Mail;

use App\Mail\ContactFormSubmission;

use App\Models\ContactMessage;
use Livewire\Component;
// use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{

    public $firstName;
    public $lastName;
    public $email;
    public $phoneType;
    public $phone;
    public $subject;
    public $messageContent;
    public $success;
    public $agreeToPolicies;
    public $newMessage;
    protected $rules = [
        'firstName' => 'required|min:2|max:255',
        'lastName' => 'required|min:2|max:255',
        'email' => 'required|email|min:2|max:255',
        'phoneType' => 'required',
        'phone' => 'required|max:14',
        'subject' => 'required|min:2|max:255',
        'messageContent' => 'required|min:5|max:500',
        // 'agreeToPolices' => 'required',
    ];

    protected $messages = [
        'firstName.required' => 'Your first name is requiered.',
        'firstName.min' => 'Your first name must contain at least 2 characters.',
        'firstName.max' => 'Your first name cannot contain more than 255 characters.',
        'lastName.required' => 'Your last name is requiered.',
        'lastName.min' => 'Your last name must contain at least 2 characters.',
        'lastName.max' => 'Your last name cannot contain more than 255 characters.',
        'email.required' => 'Your email is requiered.',
        'email.min' => 'Your email must contain at least 2 characters.',
        'email.max' => 'Your email cannot contain more than 255 characters.',
        'phone.required' => 'Your phone number is requiered.',
        'phone.min' => 'Your phone number must contain at least 14 characters.',
        'subject.required' => 'A subject is requiered.',
        'subject.min' => 'A subject must contain at least 2 characters.',
        'subject.max' => 'A subject cannot contain more than 255 characters.',
        'messageContent.required' => 'A message is requiered.',
        'messageContent.min' => 'A message must contain at least 5 characters.',
        'messageContent.max' => 'A message cannot contain more than 500 characters.',
        // 'agreeToPolices.required' => 'Please agree to our privacy and cookie policies to continue.',
    ];

    public function mount()
    {
        $this->resetForm();
    }

    public function toggleAgreeToPolices() {
        return $this->agreeToPolicies = ! $this->agreeToPolicies;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function contactFormSubmit()
    {

        $this->validate();
        // ContactMessage::create([
        //     'firstName' => $this->firstName,
        //     'lastName' => $this->lastName,
        //     'email' => $this->email,
        //     'phoneType' => $this->phoneType,
        //     'phone' => $this->phone,
        //     'subject' => $this->subject,
        //     'messageContent' => $this->messageContent,
        //     'agreeToPolicies' => $this->agreeToPolicies,
        // ]);

        $tempMessage = new ContactMessage([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phoneType' => $this->phoneType,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'messageContent' => $this->messageContent,
            'agreeToPolicies' => $this->agreeToPolicies,
        ]);
        $tempMessage->save();

        Mail::to('contact@puravidasoberliving.com')->send(new ContactFormSubmission($tempMessage));

        $this->success = 'Thank you for reaching out to us!';

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->subject = '';
        $this->email = '';
        $this->phoneType = '';
        $this->phone = '';
        $this->messageContent = '';
        $this->agreeToPolicies = false;
    }

    public function render()
    {
        // info($this->contactMessage);
        return view('livewire.contact-form');
    }
}
