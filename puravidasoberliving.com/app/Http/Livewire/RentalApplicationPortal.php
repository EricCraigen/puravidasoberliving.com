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
    // public $firstName, $middleInitial, $lastName, $dateOfBirth, $socialNumber, $phone;
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
    protected $rules;
    // protected $rules = [
    //     'personalInfo.firstName' => 'required|min:2|max:255',
    //     'personalInfo.middleInitial' => 'required|max:1',
    //     'personalInfo.lastName' => 'required|min:2|max:255',
    //     'personalInfo.dateOfBirth' => 'required|date|date_format:Y-m-d|before:today',
    //     'personalInfo.socialNumber' => ['required', 'regex:/^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$/'],
    //     'personalInfo.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
    // ];

    protected $messages = [
        // personalInfo
        'personalInfo.firstName.required' => 'Your first name is required.',
        'personalInfo.firstName.min' => 'Your first name must contain at least 2 characters.',
        'personalInfo.firstName.max' => 'Your first name cannot contain more than 255 characters.',
        'personalInfo.middleInitial.required' => 'Your middle initial is required.',
        'personalInfo.middleInitial.max' => 'Your middle initial cannot contain more than 1 character.',
        'personalInfo.lastName.required' => 'Your last name is required.',
        'personalInfo.lastName.min' => 'Your last name must contain at least 2 characters.',
        'personalInfo.lastName.max' => 'Your last name cannot contain more than 255 characters.',
        'personalInfo.dateOfBirth.required' => 'Your birth date is required.',
        'personalInfo.dateOfBirth.date' => 'Please select a valid birth date.',
        'personalInfo.dateOfBirth.date' => 'Please select a valid birth date (YYYY-MM-DD).',
        'personalInfo.dateOfBirth.before' => 'Your birth date must be before today.',
        'personalInfo.socialNumber.required' => 'Your Social Security Number is required.',
        'personalInfo.socialNumber.regex' => 'Your phone number must contain at least 14 characters.',
        'personalInfo.phone.required' => 'Your phone number is required.',
        'personalInfo.phone.regex' => 'Please enter a valid phone number.',
        // emergencyContactInfo
        'emergencyContactInfo.firstNameEmContact.required' => 'A first name is required.',
        'emergencyContactInfo.firstNameEmContact.min' => 'A first name must contain at least 2 characters.',
        'emergencyContactInfo.firstNameEmContact.max' => 'A first name cannot contain more than 255 characters.',
        'emergencyContactInfo.lastNameEmContact.required' => 'A last name is required.',
        'emergencyContactInfo.lastNameEmContact.min' => 'A last name must contain at least 2 characters.',
        'emergencyContactInfo.lastNameEmContact.max' => 'A last name cannot contain more than 255 characters.',
        'emergencyContactInfo.phoneEmContact.required' => 'A phone number is required.',
        'emergencyContactInfo.phoneEmContact.min' => 'A phone number must contain at least 14 characters.',
        'emergencyContactInfo.cityEmContact.required' => 'A city is required.',
        'emergencyContactInfo.cityEmContact.min' => 'A city must contain at least 2 characters.',
        'emergencyContactInfo.cityEmContact.max' => 'A city cannot contain more than 255 characters.',
        'emergencyContactInfo.stateEmContact.required' => 'A state is required.',
        'emergencyContactInfo.relationshipEmContact.required' => 'A kinship is required.',

    ];

    protected function rules()
    {
        return [
            // personalInfo
            'personalInfo.firstName' => 'required|min:2|max:255',
            'personalInfo.middleInitial' => 'required|max:1',
            'personalInfo.lastName' => 'required|min:2|max:255',
            'personalInfo.dateOfBirth' => 'required|date|date_format:Y-m-d|before:'. Carbon::now()->format('Y-m-d'),
            'personalInfo.socialNumber' => ['required', 'regex:/^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$/'],
            'personalInfo.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            // emergencyContactInfo
            'emergencyContactInfo.firstNameEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.lastNameEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.phoneEmContact' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'emergencyContactInfo.cityEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.stateEmContact' => 'required',
            'emergencyContactInfo.relationshipEmContact' => 'required'
        ];
    }

    public function mount()
    {
        $this->currentStep = 2;
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
        $this->clearPersonalInfo();
        $this->clearEmergencyContactInfo();
        $this->clearLegalInfo();
        // $this->emergencyContactInfo = array();
        // $this->additionalEmergencyContactInfo = array();
        // $this->emergencyContactCounter = 0;
        // $this->legalInfo = array();

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    public function completeStep()
    {
        sleep(1);
        switch ($this->currentStep) {
            case (0):
                $this->validateStep0();

                $this->toggleCompletedTaskIcon();
                break;
            case (1):
                $this->validateStep1();
                $this->validateStep1AdditionalEmergencyContacts();

                $this->toggleCompletedTaskIcon();
                break;
            case (2):
                $this->validateStep2();

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
        // $this->validate();
        $this->validate([
            'personalInfo.firstName' => 'required|min:2|max:255',
            'personalInfo.middleInitial' => 'required|max:1',
            'personalInfo.lastName' => 'required|min:2|max:255',
            'personalInfo.dateOfBirth' => 'required|date|before:'. Carbon::now()->format('Y-m-d'),
            'personalInfo.socialNumber' => ['required', 'regex:/^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$/'],
            'personalInfo.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
        ], [
            'personalInfo.firstName.required' => 'Your first name is required.',
            'personalInfo.firstName.min' => 'Your first name must contain at least 2 characters.',
            'personalInfo.firstName.max' => 'Your first name cannot contain more than 255 characters.',
            'personalInfo.middleInitial.required' => 'Your middle initial is required.',
            'personalInfo.middleInitial.max' => 'Your middle initial cannot contain more than 1 character.',
            'personalInfo.lastName.required' => 'Your last name is required.',
            'personalInfo.lastName.min' => 'Your last name must contain at least 2 characters.',
            'personalInfo.lastName.max' => 'Your last name cannot contain more than 255 characters.',
            'personalInfo.dateOfBirth.required' => 'Your birth date is required.',
            'personalInfo.dateOfBirth.date' => 'Please select a valid birth date.',
            'personalInfo.dateOfBirth.date' => 'Please select a valid birth date (YYYY-MM-DD).',
            'personalInfo.dateOfBirth.before' => 'Your birth date must be before today.',
            'personalInfo.socialNumber.required' => 'Your Social Security Number is required.',
            'personalInfo.socialNumber.regex' => 'Your phone number must contain at least 14 characters.',
            'personalInfo.phone.required' => 'Your phone number is required.',
            'personalInfo.phone.regex' => 'Please enter a valid phone number.',
        ]);
    }

    public function addEmergencyContact()
    {
        $inputsToAdd = array(
            'firstNameEmContact' => '',
            'lastNameEmContact' => '',
            'phoneEmContact' => '',
            'cityEmContact' => '',
            'stateEmContact' => '',
            'relationshipEmContact' => '',
        );
        json_encode($inputsToAdd);
        array_push($this->additionalEmergencyContactInfo, $inputsToAdd);
    }

    public function removeEmergencyContact($index)
    {
        unset($this->additionalEmergencyContactInfo[$index]);
        $this->additionalEmergencyContactInfo = array_values($this->additionalEmergencyContactInfo);
        // $this->emergencyContactCounter--;
    }

    private function validateStep1()
    {
        // $this->validate();
        $this->validate([
            'emergencyContactInfo.firstNameEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.lastNameEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.phoneEmContact' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'emergencyContactInfo.cityEmContact' => 'required|min:2|max:255',
            'emergencyContactInfo.stateEmContact' => 'required',
            'emergencyContactInfo.relationshipEmContact' => 'required'
        ], [
            'emergencyContactInfo.firstNameEmContact.required' => 'A first name is required.',
            'emergencyContactInfo.firstNameEmContact.min' => 'A first name must contain at least 2 characters.',
            'emergencyContactInfo.firstNameEmContact.max' => 'A first name cannot contain more than 255 characters.',
            'emergencyContactInfo.lastNameEmContact.required' => 'A last name is required.',
            'emergencyContactInfo.lastNameEmContact.min' => 'A last name must contain at least 2 characters.',
            'emergencyContactInfo.lastNameEmContact.max' => 'A last name cannot contain more than 255 characters.',
            'emergencyContactInfo.phoneEmContact.required' => 'A phone number is required.',
            'emergencyContactInfo.phoneEmContact.min' => 'A phone number must contain at least 14 characters.',
            'emergencyContactInfo.cityEmContact.required' => 'A city is required.',
            'emergencyContactInfo.cityEmContact.min' => 'A city must contain at least 2 characters.',
            'emergencyContactInfo.cityEmContact.max' => 'A city cannot contain more than 255 characters.',
            'emergencyContactInfo.stateEmContact.required' => 'A state is required.',
            'emergencyContactInfo.relationshipEmContact.required' => 'A kinship is required.',
        ]);
    }

    private function validateStep1AdditionalEmergencyContacts()
    {
        // $this->validate();
        foreach ($this->additionalEmergencyContactInfo as $this->additionalContactArray) {
            $this->validate([
                'additionalEmergencyContactInfo.*.firstNameEmContact' => 'required|min:2|max:255',
                'additionalEmergencyContactInfo.*.lastNameEmContact' => 'required|min:2|max:255',
                'additionalEmergencyContactInfo.*.phoneEmContact' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
                'additionalEmergencyContactInfo.*.cityEmContact' => 'required|min:2|max:255',
                'additionalEmergencyContactInfo.*.stateEmContact' => 'required',
                'additionalEmergencyContactInfo.*.relationshipEmContact' => 'required'
            ], [
                'additionalEmergencyContactInfo.*.firstNameEmContact.required' => 'A first name is required.',
                'additionalEmergencyContactInfo.*.firstNameEmContact.min' => 'A first name must contain at least 2 characters.',
                'additionalEmergencyContactInfo.*.firstNameEmContact.max' => 'A first name cannot contain more than 255 characters.',
                'additionalEmergencyContactInfo.*.lastNameEmContact.required' => 'A last name is required.',
                'additionalEmergencyContactInfo.*.lastNameEmContact.min' => 'A last name must contain at least 2 characters.',
                'additionalEmergencyContactInfo.*.lastNameEmContact.max' => 'A last name cannot contain more than 255 characters.',
                'additionalEmergencyContactInfo.*.phoneEmContact.required' => 'A phone number is required.',
                'additionalEmergencyContactInfo.*.phoneEmContact.min' => 'A phone number must contain at least 14 characters.',
                'additionalEmergencyContactInfo.*.cityEmContact.required' => 'A city is required.',
                'additionalEmergencyContactInfo.*.cityEmContact.min' => 'A city must contain at least 2 characters.',
                'additionalEmergencyContactInfo.*.cityEmContact.max' => 'A city cannot contain more than 255 characters.',
                'additionalEmergencyContactInfo.*.stateEmContact.required' => 'A state is required.',
                'additionalEmergencyContactInfo.*.relationshipEmContact.required' => 'A kinship is required.',
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
        ], [
            'legalInfo.sexOffender.required' => 'REQUIRED!',
            'legalInfo.arsonist.required' => 'REQUIRED!',
            'legalInfo.kidnapper.required' => 'REQUIRED!',
            'legalInfo.legalSupervision.required' => 'REQUIRED!',
            'legalInfo.firstNameSupervisingOfficer.required' => 'A first name is required.',
            'legalInfo.firstNameSupervisingOfficer.min' => 'A first name must contain at least 2 characters.',
            'legalInfo.firstNameSupervisingOfficer.max' => 'A first name cannot contain more than 255 characters.',
            'legalInfo.lastNameSupervisingOfficer.required' => 'A last name is required.',
            'legalInfo.lastNameSupervisingOfficer.min' => 'A last name must contain at least 2 characters.',
            'legalInfo.lastNameSupervisingOfficer.max' => 'A last name cannot contain more than 255 characters.',
            'legalInfo.agencySupervisingOfficer.required' => 'An agency name is required.',
            'legalInfo.agencySupervisingOfficer.min' => 'An agency name must contain at least 2 characters.',
            'legalInfo.agencySupervisingOfficer.max' => 'An agency name cannot contain more than 255 characters.',
            'legalInfo.phoneSupervisingOfficer.required' => 'A phone number is required.',
            'legalInfo.phoneSupervisingOfficer.min' => 'A phone number must contain at least 14 characters.',
        ]);
    }

    private function clearPersonalInfo()
    {
        $this->personalInfo = array(
            'firstName' => '',
            'middleInitial' => '',
            'lastName' => '',
            'dateOfBirth' => '',
            'socialNumber' => '',
            'phone' => '',
        );
    }

    private function clearEmergencyContactInfo()
    {
        $this->emergencyContactInfo = array(
            'firstNameEmContact' => '',
            'lastNameEmContact' => '',
            'phoneEmContact' => '',
            'cityEmContact' => '',
            'stateEmContact' => '',
            'relationshipEmContact' => '',
        );
        $this->additionalEmergencyContactInfo = array();
    }

    private function clearLegalInfo()
    {
        $this->legalInfo = array(
            'sexOffender' => '',
            'arsonist' => '',
            'kidnapper' => '',
            'legalSupervision' => '',
            'firstNameSupervisingOfficer' => '',
            'lastNameSupervisingOfficer' => '',
            'agencySupervisingOfficer' => '',
            'phoneSupervisingOfficer' => '',
        );
    }

    public function render()
    {
        return view('livewire.rental-application-portal');
    }
}
