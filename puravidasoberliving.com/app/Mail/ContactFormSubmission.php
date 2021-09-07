<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmission extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The order instance.
     *
     * @var \App\Models\ContactMessage
     */
    protected $contactMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $tempMessage)
    {
        $this->tempMessage = $tempMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_form_submission')
                    ->with([
                        'firstName' => $this->tempMessage->firstName,
                        'lastName' => $this->tempMessage->lastName,
                        'email' => $this->tempMessage->email,
                        'phoneType' => $this->tempMessage->phoneType,
                        'phone' => $this->tempMessage->phone,
                        'subject' => $this->tempMessage->subject,
                        'messageContent' => $this->tempMessage->messageContent,
                        'agreeToPolicies' => $this->tempMessage->agreeToPolicies,
                    ]);
    }
}
