<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RentalApplicationPortal extends Component
{

    public $stepTitles;
    public $stepStatuses;
    public $currentStep;
    public $totalSteps;
    public $personalInfo;
    public $emergencyContactInfo;
    public $legalInfo;
    public $medicalInfo;
    public $fundingInfo;
    public $identicifationInfo;
    public $recoveryInfo;
    public $consentForm;
    public $messageContent;
    public $success;
    public $agreeToPolicies;
    public $newMessage;

    public function mount()
    {
        $this->currentStep = 1;
        $this->totalSteps = 9;
        $this->stepTitles = [
           'Personal Info',
           'Emergency Contacts',
           'Legal Info',
           'Medical Info',
           'Funding Info',
           'Identification Info',
           'Recovery Info',
           'Review',
           'Consent Form',
           'Submitted',
        ];
        $this->stepStatuses = [
            'Personal Info' => 'current',
            'Emergency Contacts' => 'pending',
            'Legal Info' => 'pending',
            'Medical Info' => 'pending',
            'Funding Info' => 'pending',
            'Identification Info' => 'pending',
            'Recovery Info' => 'pending',
            'Review' => 'pending',
            'Consent Form' => 'pending',
            'Submitted' => 'pending',
         ];
        $this->personalInfo = array();
    }

    public function prevStep() {
        sleep(1);
        // $valFail = false;
        // $valPass = true;



        // if ($valPass) {
        //     if ($this->stepStatuses[$this->stepTitles[$this->currentStep - 1]]  != 'complete') {
        //         if ($this->stepStatuses[$this->stepTitles[$this->currentStep - 2]] == 'complete' ) {
        //             $this->stepStatuses[$this->stepTitles[$this->currentStep - 2]] = 'complete';
        //             $this->stepStatuses[$this->stepTitles[$this->currentStep - 1]] = 'current';
        //         } else {
        //             $this->stepStatuses[$this->stepTitles[$this->currentStep - 1]] = 'pending';
        //             $this->stepStatuses[$this->stepTitles[$this->currentStep - 2]] = 'current';
        //         }

        //     } else {
        //         $this->stepStatuses[$this->stepTitles[$this->currentStep - 1]] = 'pending';
        //         $this->stepStatuses[$this->stepTitles[$this->currentStep - 2]] = 'complete';
        //     }
        // }

        if ($this->currentStep == 1) {
            return;
        } else {
            $this->currentStep--;
        }


    }

    public function nextStep() {
        sleep(1);
        // if ($this->stepStatuses[$this->stepTitles[$this->currentStep - 2] < 0 ? 0 : $this->stepStatuses[$this->stepTitles[$this->currentStep - 2]]] == 'complete' ) {
        //     $this->stepStatuses[$this->stepTitles[$this->currentStep - 2]] = 'current';
        // } else {
        //     $prevStatus = $this->stepStatuses[$this->stepTitles[$this->currentStep - 2]];
        //     $currentStatus = $this->stepStatuses[$this->stepTitles[$this->currentStep - 1]];
        //     $nextStatus = $this->stepStatuses[$this->stepTitles[$this->currentStep]];
        // }


        // Validate currentStep's form

        // if (success) set currentStep's value to completed

        if ($this->stepStatuses[$this->stepTitles[$this->currentStep - 1]] != 'complete') {
            // if validation fails
            $this->stepStatuses[$this->stepTitles[$this->currentStep - 1]] = 'complete';
            $this->stepStatuses[$this->stepTitles[$this->currentStep]] = 'current';
        } else {
            // $this->stepStatuses[$this->stepTitles[$this->currentStep - 1]] = 'pending';
            $this->stepStatuses[$this->stepTitles[$this->currentStep]] = 'current';
        }

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
