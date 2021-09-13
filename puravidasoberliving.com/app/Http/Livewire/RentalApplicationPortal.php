<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class RentalApplicationPortal extends Component
{

    public $stepTitles;
    public $stepStatuses;
    public $currentStep;
    public $totalSteps;
    public $personalInfo;
    public $emergencyContactInfo;
    // public $emergencyContactCounter;
    public $additionalEmergencyContactInfo;
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
    public $us_state_abbrevs_names;
    public $relationalStatuses;

    public function mount()
    {
        $this->currentStep = 1;
        $this->totalSteps = 10;
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
        $this->us_state_abbrevs_names = array(
            'AL'=>'ALABAMA',
            'AK'=>'ALASKA',
            'AS'=>'AMERICAN SAMOA',
            'AZ'=>'ARIZONA',
            'AR'=>'ARKANSAS',
            'CA'=>'CALIFORNIA',
            'CO'=>'COLORADO',
            'CT'=>'CONNECTICUT',
            'DE'=>'DELAWARE',
            'DC'=>'DISTRICT OF COLUMBIA',
            'FM'=>'FEDERATED STATES OF MICRONESIA',
            'FL'=>'FLORIDA',
            'GA'=>'GEORGIA',
            'GU'=>'GUAM GU',
            'HI'=>'HAWAII',
            'ID'=>'IDAHO',
            'IL'=>'ILLINOIS',
            'IN'=>'INDIANA',
            'IA'=>'IOWA',
            'KS'=>'KANSAS',
            'KY'=>'KENTUCKY',
            'LA'=>'LOUISIANA',
            'ME'=>'MAINE',
            'MH'=>'MARSHALL ISLANDS',
            'MD'=>'MARYLAND',
            'MA'=>'MASSACHUSETTS',
            'MI'=>'MICHIGAN',
            'MN'=>'MINNESOTA',
            'MS'=>'MISSISSIPPI',
            'MO'=>'MISSOURI',
            'MT'=>'MONTANA',
            'NE'=>'NEBRASKA',
            'NV'=>'NEVADA',
            'NH'=>'NEW HAMPSHIRE',
            'NJ'=>'NEW JERSEY',
            'NM'=>'NEW MEXICO',
            'NY'=>'NEW YORK',
            'NC'=>'NORTH CAROLINA',
            'ND'=>'NORTH DAKOTA',
            'MP'=>'NORTHERN MARIANA ISLANDS',
            'OH'=>'OHIO',
            'OK'=>'OKLAHOMA',
            'OR'=>'OREGON',
            'PW'=>'PALAU',
            'PA'=>'PENNSYLVANIA',
            'PR'=>'PUERTO RICO',
            'RI'=>'RHODE ISLAND',
            'SC'=>'SOUTH CAROLINA',
            'SD'=>'SOUTH DAKOTA',
            'TN'=>'TENNESSEE',
            'TX'=>'TEXAS',
            'UT'=>'UTAH',
            'VT'=>'VERMONT',
            'VI'=>'VIRGIN ISLANDS',
            'VA'=>'VIRGINIA',
            'WA'=>'WASHINGTON',
            'WV'=>'WEST VIRGINIA',
            'WI'=>'WISCONSIN',
            'WY'=>'WYOMING',
            'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
            'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
            'AP'=>'ARMED FORCES PACIFIC'
        );
        $this->personalInfo = array();
        $this->emergencyContactInfo = array();
        $this->additionalEmergencyContactInfo = array();
        // $this->emergencyContactCounter = 0;
        $this->legalInfo = array();
        $this->relationalStatuses = array(
            '1' => 'Sister-in-Law',
            '2' => 'Stepfather',
            '3' => 'Stepmother',
            '4' => 'Stepdaughter',
            '5' => 'Stepson',
            '6' => 'Stepbrother',
            '7' => 'Stepsister',
            '8' => 'Partner',
            '9' => 'Legal Guardian',
            'A' => 'Aunt',
            'B' => 'Brother',
            'C' => 'Cousin',
            'D' => 'Daughter',
            'E' => 'Son',
            'F' => 'Father',
            'G' => 'Grandfather',
            'H' => 'Grandmother',
            'I' => 'Spouse',
            'J' => 'Niece',
            'K' => 'Nephew',
            'M' => 'Mother',
            'N' => 'Mother-in-Law',
            'O' => 'Other',
            'Q' => 'Mental Health Contact',
            'R' => 'Great Grandparent',
            'S' => 'Sister',
            'T' => 'Friend',
            'U' => 'Uncle',
            'V' => 'Former Spouse',
            'W' => 'Legally Separated Spouse',
            'Y' => 'Father-in-Law',
            'Z' => 'Brother-in-Law'
        );
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function addEmergencyContact()
    {
        // $this->emergencyContactCounter++;
        $inputsToAdd = array(
            'firstNameEmContact' => '',
            'lastNameEmContact' => '',
            'phoneEmContact' => '',
            'cityEmContact' => '',
            'stateEmContact' => '',
            'relationshipEmContact' => '',
        );
        json_encode($inputsToAdd);
        // for($inputsToAdd = 4; $inputsToAdd >= 0;  $inputsToAdd--) {
        array_push($this->additionalEmergencyContactInfo, $inputsToAdd);
        // $this->emergencyContactCounter++;
        // sleep(1);
        // }

    }

    public function removeEmergencyContact($index) {
        unset($this->additionalEmergencyContactInfo[$index]);
        $this->additionalEmergencyContactInfo = array_values($this->additionalEmergencyContactInfo);
        // $this->emergencyContactCounter--;
    }

    public function validateStep()
    {
        sleep(1);
        switch ($this->currentStep) {
            case (0):
                // $this->validateStep0();

                $this->toggleCompletedTaskIcon();
                break;
            case (1):
                $this->validateStep1();
                $this->validateStep1AdditionalEmergencyContacts();

                $this->toggleCompletedTaskIcon();
                break;
            case (2):
                // $this->validateStep2();

                $this->toggleCompletedTaskIcon();
                break;
            default;
        }



        // write to database

        $this->nextStep();
        // $this->success = 'Application Saved!';
    }

    private function validateStep0()
    {
        $this->validate([
            'personalInfo.firstName' => 'required|min:2|max:255',
            'personalInfo.middleInitial' => 'required|max:1',
            'personalInfo.lastName' => 'required|min:2|max:255',
            'personalInfo.dateOfBirth' => 'required|date|before:'. Carbon::now()->format('Y-m-d'),
            'personalInfo.socialNumber' => ['required', 'regex:/^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$/'],
            'personalInfo.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
        ], [
            'personalnfo.firstName.required' => 'Your first name is requiered.',
            'personalnfo.firstName.min' => 'Your first name must contain at least 2 characters.',
            'personalnfo.firstName.max' => 'Your first name cannot contain more than 255 characters.',
        ]);
    }

    private function validateStep1()
    {
        $this->validate([
            'emergencyContactInfo.firstNameEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.lastNameEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.phoneEmContact' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'emergencyContactInfo.cityEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.stateEmContact' => 'required',
            'emergencyContactInfo.relationshipEmContact' => 'required'
        ], [
            'emergencyContactInfo.firstName.required' => 'Your first name is requiered.',
            'emergencyContactInfo.firstName.min' => 'Your first name must contain at least 2 characters.',
            'emergencyContactInfo.firstName.max' => 'Your first name cannot contain more than 255 characters.',
            'emergencyContactInfo.lastName.required' => 'Your last name is requiered.',
            'emergencyContactInfo.lastName.min' => 'Your last name must contain at least 2 characters.',
            'emergencyContactInfo.lastName.max' => 'Your last name cannot contain more than 255 characters.',
            'emergencyContactInfo.phone.required' => 'Your phone number is requiered.',
            'emergencyContactInfo.phone.min' => 'Your phone number must contain at least 14 characters.',
            'emergencyContactInfo.cityEmContact.required' => 'City is requiered.',
            'emergencyContactInfo.cityEmContact.min' => 'City must contain at least 2 characters.',
            'emergencyContactInfo.cityEmContact.max' => 'City cannot contain more than 255 characters.',
            'emergencyContactInfo.stateEmContact.required' => 'State is requiered.',
            'emergencyContactInfo.relationshipEmContact.required' => 'Kinship is requiered.',
        ]);
    }

    private function validateStep1AdditionalEmergencyContacts()
    {
        foreach ($this->additionalEmergencyContactInfo as $this->additionalContactArray) {
            $this->validate([
                'additionalEmergencyContactInfo.*.firstNameEmContact' => 'required|min:2|max:255',
                'additionalEmergencyContactInfo.*.lastNameEmContact' => 'required|min:2|max:255',
                'additionalEmergencyContactInfo.*.phoneEmContact' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
                'additionalEmergencyContactInfo.*.cityEmContact' => 'required|min:2|max:255',
                'additionalEmergencyContactInfo.*.stateEmContact' => 'required',
                'additionalEmergencyContactInfo.*.relationshipEmContact' => 'required'
            ], [
                '*.firstName.required' => 'Your first name is requiered.',
                '*.firstName.min' => 'Your first name must contain at least 2 characters.',
                '*.firstName.max' => 'Your first name cannot contain more than 255 characters.',
                '*.lastName.required' => 'Your last name is requiered.',
                '*.lastName.min' => 'Your last name must contain at least 2 characters.',
                '*.lastName.max' => 'Your last name cannot contain more than 255 characters.',
                '*.phone.required' => 'Your phone number is requiered.',
                '*.phone.min' => 'Your phone number must contain at least 14 characters.',
                '*.cityEmContact.required' => 'City is requiered.',
                '*.cityEmContact.min' => 'City must contain at least 2 characters.',
                '*.cityEmContact.max' => 'City cannot contain more than 255 characters.',
                '*.stateEmContact.required' => 'State is requiered.',
                '*.relationshipEmContact.required' => 'Kinship is requiered.',
            ]);
        }

    }

    private function validateStep2()
    {
        $this->validate([
            'legalInfo.sexOffender' => 'required',
            'legalInfo.arsonist' => 'required',
            'legalInfo.kidnapper' => 'required',
            'legalInfo.legalSupervision' => 'required',
            'legalInfo.firstNameSupervisingOfficer' => 'required|min:2|max:255',
            'legalInfo.lastNameSupervisingOfficer' => 'required|min:2|max:255',
            'legalInfo.agencySupervisingOfficer' => 'required|min:2|max:255',
            'legalInfo.phoneSupervisingOfficer' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
        ]);
    }

    public function toggleCompletedTaskIcon()
    {
        $this->stepStatuses[$this->stepTitles[$this->currentStep]] = 'complete';
        $this->stepStatuses[$this->stepTitles[$this->currentStep + 1]] = 'current';
    }

    public function prevStep()
    {

        if ($this->currentStep == 0) {
            return;
        } else {
            $this->currentStep--;
        }


    }

    public function nextStep()
    {

        if ($this->currentStep == $this->totalSteps - 1) {
            return;
        } else {
            $this->currentStep++;
        }

    }

    public function render()
    {
        return view('livewire.rental-application-portal');
    }
}
