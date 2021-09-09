<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RentalApplicationPortal extends Component
{

    public $stepTitles;
    public $currentStep;
    public $totalSteps;
    public $consentForm;
    public $personalInfo;
    public $emergencyContactInfo;
    public $legalInfo;
    public $medicalInfo;
    public $fundingInfo;
    public $identicifationInfo;
    public $recoveryInfo;
    public $messageContent;
    public $success;
    public $agreeToPolicies;
    public $newMessage;

    public function mount()
    {
        $this->currentStep = 1;
        $this->totalSteps = 9;
        $this->stepTitles = [
           'Consent Form',
           'Personal Info',
           'Emergency Contacts',
           'Legal Info',
           'Medical Info',
           'Funding Info',
           'Identification Info',
           'Recovery Info',
           'Review',
           'Submitted',
        ];
        $this->consentForm = array([
            'consents1' => 0,
        ]);
    }

    public function prevStep() {
        sleep(1);
        if ($this->currentStep == 1) {
            return;
        } else {
            $this->currentStep--;
        }

    }

    public function nextStep() {
        sleep(1);
        if ($this->currentStep == $this->totalSteps) {
            return;
        } else {
            $this->currentStep++;
        }

    }

    public function rentalAppFormSubmit() {
        // submit final form

    }

    public function render()
    {
        return view('livewire.rental-application-portal');
    }
}
