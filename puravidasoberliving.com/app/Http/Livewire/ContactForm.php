<?php

namespace App\Http\Livewire;
// namespace App\Mail;

use Livewire\Component;
use Mail;

class ContactForm extends Component
{

    public $firstName;
    public $lastName;
    public $subject;
    public $email;
    public $country;
    public $phone;
    public $messageContent;
    public $success;
    public $agreeToPolicies;
    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'subject' => 'required',
        'email' => 'required|email',
        'country' => 'required',
        'phone' => 'required',
        'messageContent' => 'required|min:5',
    ];

    public function mount()
    {
        $this->agreeToPolicies = false;
    }

    public function toggleAgreeToPolices() {
        return $this->agreeToPolicies = ! $this->agreeToPolicies;
    }

    public function contactFormSubmit()
    {
        $contact = $this->validate();

        Mail::send('email',
        array(
            'firstNname' => $this->firstName,
            'lastName' => $this->lastName,
            'lastName' => $this->lastName,
            'subject' => $this->subject,
            'email' => $this->email,
            'country' => $this->country,
            'phone' => $this->phone,
            'messageContent' => $this->messageContent,
            ),
            function($message){
                $message->from('noreply@puravidasoberliving.com');
                $message->to('noreply@puravidasoberliving.com', 'To whom it may concern,')->subject('Your Site Contact Form');
            }
        );

        $this->success = 'Thank you for reaching out to us!';

        $this->clearFields();
    }

    private function clearFields()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->subject = '';
        $this->email = '';
        $this->country = '';
        $this->phone = '';
        $this->messageContent = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
