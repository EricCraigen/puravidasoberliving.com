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
        // legalInfo
        'legalInfo.isSexOffender.required' => 'REQUIRED!',
        'legalInfo.isArsonist.required' => 'REQUIRED!',
        'legalInfo.isKidnapper.required' => 'REQUIRED!',
        'legalInfo.onLegalSupervision.required' => 'REQUIRED!',
        'legalInfo.firstName.required' => 'A first name is required.',
        'legalInfo.firstName.min' => 'A first name must contain at least 2 characters.',
        'legalInfo.firstName.max' => 'A first name cannot contain more than 255 characters.',
        'legalInfo.lastName.required' => 'A last name is required.',
        'legalInfo.lastName.min' => 'A last name must contain at least 2 characters.',
        'legalInfo.lastName.max' => 'A last name cannot contain more than 255 characters.',
        'legalInfo.agency.required' => 'An agency name is required.',
        'legalInfo.agency.min' => 'An agency name must contain at least 2 characters.',
        'legalInfo.agency.max' => 'An agency name cannot contain more than 255 characters.',
        'legalInfo.phone.required' => 'A phone number is required.',
        'legalInfo.phone.min' => 'A phone number must contain at least 14 characters.',
        'legalInfo.convictions.*.min' => 'A conviction must contain at least 2 characters.',
        'legalInfo.convictions.*.max' => 'A conviction cannot contain more than 255 characters.',
        // medicalInfo
        'medicalInfo.hasScripts.required' => 'REQUIRED!',
        'medicalInfo.medications.*.min' => 'A medication name must contain at least two (2) characters.',
        'medicalInfo.medications.*.max' => 'A medication name must cannot contain 255 characters.',
        // 'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
        // 'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
        // 'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
        // 'medicalInfo.drugUse.lastUse.*.required' => 'Please select a valid last use date (YYYY-MM-DD).',
        // 'medicalInfo.drugUse.lastUse.*.required' => 'Your last use date must be before today.',
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
            'emergencyContactInfo.relationshipEmContact' => 'required',
            // legalInfo
            'legalInfo.isSexOffender' => 'required',
            'legalInfo.isArsonist' => 'required',
            'legalInfo.isKidnapper' => 'required',
            'legalInfo.onLegalSupervision' => 'required',
            'legalInfo.firstName' => 'required|min:2|max:255',
            'legalInfo.lastName' => 'required|min:2|max:255',
            'legalInfo.agency' => 'required|min:2|max:255',
            'legalInfo.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'legalInfo.convictions.*' => 'min:2|max:255',
            // medicalInfo
            'medicalInfo.hasScripts' => 'required',
            'medicalInfo.medications.*' => 'min:2|max:255',
            // 'medicalInfo.drugUse.drugOfChoice.*' => 'min:2|max:255',
            // 'medicalInfo.drugUse.lastUse.*' => 'required|date|before:'. Carbon::now()->format('Y-m-d'),
        ];
    }

    public function mount()
    {
        $this->currentStep = 3;
        $this->totalSteps = 10;
        $this->clearStepTitles();
        $this->clearStepStatuses();
        $this->clearUsStateAbbrevsNames();
        $this->clearKinshipStatuses();
        $this->clearPersonalInfo();
        $this->clearEmergencyContactInfo();
        $this->clearLegalInfo();
        $this->clearMedicalInfo();
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
                $this->validateStep1();

                $this->toggleCompletedTaskIcon();
                break;
            case (1):
                $this->validateStep2();
                $this->validateStep2AdditionalEmergencyContacts();

                $this->toggleCompletedTaskIcon();
                break;
            case (2):
                $this->validateStep3();

                $this->toggleCompletedTaskIcon();
                break;
            case (3):
                $this->validateStep4();

                $this->toggleCompletedTaskIcon();
                break;
            default;
        }



        // write to database

        $this->nextStep();
        // $this->success = 'Application Saved!';
    }

    private function validateStep1()
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

    public function addConviction()
    {
        array_push($this->legalInfo['convictions'], '');
    }

    public function removeConviction($index)
    {
        unset($this->legalInfo['convictions'][$index]);
        $this->legalInfo['convictions'] = array_values($this->legalInfo['convictions']);
    }

    public function addMedication()
    {
        array_push($this->medicalInfo['medications'], '');
    }

    public function removeMedication($index)
    {
        unset($this->medicalInfo['medications'][$index]);
        $this->medicalInfo['medications'] = array_values($this->medicalInfo['medications']);
    }

    public function removeEmergencyContact($index)
    {
        unset($this->additionalEmergencyContactInfo[$index]);
        $this->additionalEmergencyContactInfo = array_values($this->additionalEmergencyContactInfo);
        // $this->emergencyContactCounter--;
    }

    private function validateStep2()
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

    private function validateStep2AdditionalEmergencyContacts()
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

    private function validateStep3()
    {
        if ($this->legalInfo['onLegalSupervision'] == null || $this->legalInfo['onLegalSupervision'] == 0) {
            $this->validate([
                'legalInfo.isSexOffender' => 'required',
                'legalInfo.isArsonist' => 'required',
                'legalInfo.isKidnapper' => 'required',
                'legalInfo.onLegalSupervision' => 'required',
                'legalInfo.convictions.*' => 'min:2|max:255',
            ], [
                'legalInfo.isSexOffender.required' => 'REQUIRED!',
                'legalInfo.isArsonist.required' => 'REQUIRED!',
                'legalInfo.isKidnapper.required' => 'REQUIRED!',
                'legalInfo.onLegalSupervision.required' => 'REQUIRED!',
                'legalInfo.convictions.*.min' => 'A conviction must contain at least 2 characters.',
                'legalInfo.convictions.*.max' => 'A conviction cannot contain more than 255 characters.',
            ]);
        } else {
            $this->validate([
                'legalInfo.isSexOffender' => 'required',
                'legalInfo.isArsonist' => 'required',
                'legalInfo.isKidnapper' => 'required',
                'legalInfo.onLegalSupervision' => 'required',
                'legalInfo.firstName' => 'required|min:2|max:255',
                'legalInfo.lastName' => 'required|min:2|max:255',
                'legalInfo.agency' => 'required|min:2|max:255',
                'legalInfo.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
                'legalInfo.convictions.*' => 'min:2|max:255',
            ], [
                'legalInfo.isSexOffender.required' => 'REQUIRED!',
                'legalInfo.isArsonist.required' => 'REQUIRED!',
                'legalInfo.isKidnapper.required' => 'REQUIRED!',
                'legalInfo.onLegalSupervision.required' => 'REQUIRED!',
                'legalInfo.firstName.required' => 'A first name is required.',
                'legalInfo.firstName.min' => 'A first name must contain at least 2 characters.',
                'legalInfo.firstName.max' => 'A first name cannot contain more than 255 characters.',
                'legalInfo.lastName.required' => 'A last name is required.',
                'legalInfo.lastName.min' => 'A last name must contain at least 2 characters.',
                'legalInfo.lastName.max' => 'A last name cannot contain more than 255 characters.',
                'legalInfo.agency.required' => 'An agency name is required.',
                'legalInfo.agency.min' => 'An agency name must contain at least 2 characters.',
                'legalInfo.agency.max' => 'An agency name cannot contain more than 255 characters.',
                'legalInfo.phone.required' => 'A phone number is required.',
                'legalInfo.phone.min' => 'A phone number must contain at least 14 characters.',
                'legalInfo.convictions.*.min' => 'A conviction must contain at least 2 characters.',
                'legalInfo.convictions.*.max' => 'A conviction cannot contain more than 255 characters.',
            ]);
        }

    }

    private function validateStep4()
    {
        if ($this->medicalInfo['hasScripts'] == null || $this->medicalInfo['hasScripts'] == 0) {
            $this->validate([
                'medicalInfo.hasScripts' => 'required',
                // 'medicalInfo.medications' => 'min:2|max:255',
                // 'medicalInfo.drugUse.drugOfChoice' => 'min:2|max:255',
                // 'medicalInfo.drugUse.lastUse' => 'required|date|before:'. Carbon::now()->format('Y-m-d'),
            ], [
                'medicalInfo.hasScripts.required' => 'REQUIRED!',
                // 'medicalInfo.medications.*.min' => 'A medication name must contain at least two (2) characters.',
                // 'medicalInfo.medications.*.max' => 'A medication name must cannot contain 255 characters.',
                // 'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
                // 'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
                // 'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
                // 'medicalInfo.drugUse.lastUse.*.required' => 'Please select a valid last use date (YYYY-MM-DD).',
                // 'medicalInfo.drugUse.lastUse.*.required' => 'Your last use date must be before today.',
            ]);
        } else {
            $this->validate([
                'medicalInfo.hasScripts' => 'required',
                'medicalInfo.medications.*' => 'min:2|max:255',
                // 'medicalInfo.drugUse.drugOfChoice' => 'min:2|max:255',
                // 'medicalInfo.drugUse.lastUse' => 'required|date|before:'. Carbon::now()->format('Y-m-d'),
            ], [
                'medicalInfo.hasScripts.required' => 'REQUIRED!',
                'medicalInfo.medications.*.min' => 'A medication name must contain at least two (2) characters.',
                'medicalInfo.medications.*.max' => 'A medication name must cannot contain 255 characters.',
                // 'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
                // 'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
                // 'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
                // 'medicalInfo.drugUse.lastUse.*.required' => 'Please select a valid last use date (YYYY-MM-DD).',
                // 'medicalInfo.drugUse.lastUse.*.required' => 'Your last use date must be before today.',
            ]);
        }
    }

    private function clearStepTitles()
    {
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
    }

    private function clearStepStatuses()
    {
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
    }

    private function clearUsStateAbbrevsNames()
    {
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
    }

    private function clearKinshipStatuses()
    {
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
            'isSexOffender' => '',
            'isArsonist' => '',
            'isKidnapper' => '',
            'onLegalSupervision' => '',
            'firstName' => '',
            'lastName' => '',
            'agency' => '',
            'phone' => '',
            'convictions' => [],
        );
    }

    private function clearMedicalInfo()
    {
        $this->medicalInfo = array(
            'hasScripts' => '',
            'medications' => [
                ''
            ],
            'drugUse' => [
                'drugOfChoice' => [],
                'lastUse' => []
            ],
        );
    }

    public function render()
    {
        return view('livewire.rental-application-portal');
    }
}
