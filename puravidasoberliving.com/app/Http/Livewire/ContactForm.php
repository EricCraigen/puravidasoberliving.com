<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Mail;

class ContactForm extends Component
{

    public $firstName;
    public $lastName;
    public $company;
    public $email;
    public $country;
    public $phone;
    public $messageContent;
    public $success;
    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'company' => 'required',
        'email' => 'required|email',
        'country' => 'required',
        'phone' => 'required',
        'messageContent' => 'required|min:5',
    ];

    public function contactFormSubmit()
    {
        $contact = $this->validate();

        Mail::send('email',
        array(
            'firstNname' => $this->firstName,
            'lastName' => $this->lastName,
            'lastName' => $this->lastName,
            'company' => $this->company,
            'email' => $this->email,
            'country' => $this->country,
            'phone' => $this->phone,
            'messageContent' => $this->messagmessageContente,
            ),
            function($message){
                $message->from('noreply@puravidasoberliving.com');
                $message->to('noreply@puravidasoberliving.com', 'To whom it may concern,')->subject('Your Site Contect Form');
            }
        );

        $this->success = 'Thank you for reaching out to us!';

        $this->clearFields();
    }

    private function clearFields()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->company = '';
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
