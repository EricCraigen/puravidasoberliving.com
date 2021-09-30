<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RentalApplicationPortal extends Component
{

    use WithFileUploads;

    public $stepTitles;
    public $user;
    public $userInitials;
    public $userSignature;
    public $selectAllConsentForm;
    public $selectAllRulesAndRegulations;
    public $initialAllAdditionalConsentForm;
    public $isAdmin;
    public $isAdminEditing;
    public $stepAdminIsEditing;
    public $stepStatuses;
    public $currentStep;
    public $totalSteps;
    public $submitted;
    public $today;
    public $previewActive;
    public $previewIDFrontActive;
    public $previewIDBackActive;
    public $fileToPreview;
    public $personalInfo;
    public $emergencyContactInfo;
    public $additionalEmergencyContactInfo;
    public $legalInfo;
    public $medicalInfo;
    public $fundingInfo;
    public $identificationInfo;
    public $recoveryInfo;
    public $consentForm;
    public $consentFormAdditional;
    public $consentFormSignature;
    public $rulesAndRegulationsSignature;
    public $rulesAndRegulations;
    public $rentalApplicationSignature;
    public $messageContent;
    public $navMessageContent;
    public $success;
    public $agreeToPolicies;
    public $newMessage;
    public $us_state_abbrevs_names;
    public $relationalStatuses;
    public $reasonsForLeaving;
    public $identificationTypes;
    public $hasIDCardUpload;
    public $photoIdCardFront;
    public $photoIdCardBack;
    public $additionalDocumentation;
    protected $rules;

    protected $messages =
    [
        'photoIdCardFront.image' => 'Image failed to upload. Valid file formats: .jpeg, .png, .jpg, .bmp, .gif',
        'photoIdCardFront.max' => 'File size cannot exceed 1MB.',
        'photoIdCardBack.image' => 'Image failed to upload. Valid file formats: .jpeg, .png, .jpg, .bmp, .gif',
        'photoIdCardBack.max' => 'File size cannot exceed 1MB.',
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
        'medicalInfo.medications.*.required' => 'Medication input must be completed or removed.',
        'medicalInfo.medications.*.min' => 'A medication name must contain at least two (2) characters.',
        'medicalInfo.medications.*.max' => 'A medication name must cannot contain 255 characters.',
        'medicalInfo.drugUse.drugOfChoice.*.required' => 'Drug of choice input must be completed or removed.',
        'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
        'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
        'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
        'medicalInfo.drugUse.lastUse.*.date' => 'Please select a valid last use date (YYYY-MM-DD).',
        'medicalInfo.drugUse.lastUse.*.before_or_equal' => 'Your last use date must be before today.',
        // fundingInfo
        'fundingInfo.hasLivedWithPVSL.required' => 'REQUIRED!',
        'fundingInfo.moveOutDate.required' => 'Please select a move out date.',
        'fundingInfo.moveOutDate.date' => 'Please select a valid move out date (YYYY-MM-DD).',
        'fundingInfo.moveOutDate.before_or_equal' => 'Your move out date must be before today.',
        'fundingInfo.reasonForLeaving.required' => 'REQUIRED!',
        'fundingInfo.hasPaidAdminFee.required' => 'REQUIRED!',
        'fundingInfo.sources.*.name.required' => 'Funding source input must be completed or removed.',
        'fundingInfo.sources.*.name.min:2' => 'Funding source must contain at least two (2) characters.',
        'fundingInfo.sources.*.name.max:255' => 'Funding source input cannot contain 255 characters.',
        'fundingInfo.sources.*.amount.required' => 'Please enter a funding amount.',
        'fundingInfo.sources.*.amount.numeric' => 'Funding amount must be a number.',
        'fundingInfo.sources.*.amount.min:1' => 'Funding amount cannot be below $1.00.',
        'fundingInfo.sources.*.frequency.required' => 'REQUIRED!',
        'fundingInfo.sources.*.startDate.required' => 'Please select a start date.',
        'fundingInfo.sources.*.startDate.date' => 'Please select a valid start date (YYYY-MM-DD).',
        'fundingInfo.sources.*.startDate.before_or_equal' => 'Your start date must be before today.',
        'fundingInfo.sources.*.reference.firstName.required' => 'Please enter a first name.',
        'fundingInfo.sources.*.reference.firstName.min:2' => 'Reference first name must contain at least two (2) characters.',
        'fundingInfo.sources.*.reference.firstName.max:255' => 'Reference first name cannot contain 255 characters.',
        'fundingInfo.sources.*.reference.lastName.required' => 'Please enter a last name.',
        'fundingInfo.sources.*.reference.lastName.min:2' => 'Reference last name must contain at least two (2) characters.',
        'fundingInfo.sources.*.reference.lastName.max:255' => 'Reference last name cannot contain 255 characters.',
        'fundingInfo.sources.*.reference.phone.required' => 'Please enter a contact number.',
        'fundingInfo.sources.*.reference.phone.regex' => 'Please enter a valid contact number.',
        // identificationInfo
        'identificationInfo.type.required' => 'An identification type is required.',
        'identificationInfo.state.required' => 'A state is required.',
        'identificationInfo.number.required' => 'An identification number is required.',
        'identificationInfo.number.min' => 'An identification number must contain at least 2 characters.',
        'identificationInfo.number.max' => 'An identification number contain more than 50 characters.',
        'identificationInfo.expiration.required' => 'An experiation date is required.',
        'identificationInfo.expiration.date' => 'Please select a valid experiation date.',
        'identificationInfo.hasSocialCard.required' => 'Please indicate if you possess a social security card.',
        // recoveryInfo
        'recoveryInfo.txtGoingWell.required' => 'Tell us what is going well in your recovery.',
        'recoveryInfo.txtGoingWell.min' => 'This field must have at least 10 characters.',
        'recoveryInfo.txtGoingWell.max' => 'This field cannot have at least 10 characters.',
        'recoveryInfo.txtGoingBad.required' => 'Tell us what is NOT going well in you recovery.',
        'recoveryInfo.txtGoingBad.min' => 'This field must have at least 10 characters.',
        'recoveryInfo.txtGoingBad.max' => 'This field cannot have at least 10 characters.',
        'recoveryInfo.txtHopesGoals.required' => 'Tell us your hopes and goals for the future.',
        'recoveryInfo.txtHopesGoals.min' => 'This field must have at least 10 characters.',
        'recoveryInfo.txtHopesGoals.max' => 'This field cannot have at least 10 characters.',
    ];

    protected function rules()
    {
        return [

            'photoIdCardFront' => 'image|max:12288',
            'photoIdCardBack' => 'image|max:12288',
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
            'medicalInfo.medications.*' => 'required|min:2|max:255',
            'medicalInfo.drugUse.drugOfChoice.*' => 'required|min:2|max:255',
            'medicalInfo.drugUse.lastUse.*' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
            // fundingInfo
            'fundingInfo.hasLivedWithPVSL' => 'required',
            'fundingInfo.moveOutDate' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
            'fundingInfo.reasonForLeaving' => 'required',
            'fundingInfo.hasPaidAdminFee' => 'required',
            'fundingInfo.sources.*.name' => 'required|min:2|max:255',
            'fundingInfo.sources.*.amount' => 'required|numeric|min:1',
            'fundingInfo.sources.*.frequency' => 'required',
            'fundingInfo.sources.*.startDate' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
            'fundingInfo.sources.*.reference.firstName' => 'required|min:2|max:255',
            'fundingInfo.sources.*.reference.lastName' => 'required|min:2|max:255',
            'fundingInfo.sources.*.reference.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            // identificationInfo
            'identificationInfo.type' => 'required',
            'identificationInfo.state' => 'required',
            'identificationInfo.number' => 'required|min:2|max:50',
            'identificationInfo.expiration' => 'required|date',
            'identificationInfo.hasSocialCard' => 'required',
            // recoveryInfo
            'recoveryInfo.txtGoingWell' => 'required|min:10|max:5000',
            'recoveryInfo.txtGoingBad' => 'required|min:10|max:5000',
            'recoveryInfo.txtHopesGoals' => 'required|min:10|max:5000',
        ];
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->userInitials = '';
        $this->userSignature = '';
        $this->selectAllConsentForm = false;
        $this->selectAllRulesAndRegulations = false;
        $this->initialAllAdditionalConsentForm = false;
        $this->isAdminEditing = false;
        $this->stepAdminIsEditing = -1;
        $this->currentStep = 0;
        $this->totalSteps = 11;
        $this->submitted = false;
        $this->hasIDCardUpload = false;
        $this->previewActive = false;
        $this->previewIDFrontActive = false;
        $this->previewIDBackActive = false;
        $this->fileToPreview = '';
        $this->additionalDocumentation = [];
        $this->today = Carbon::now()->format('Y-m-d');
        $this->setIsAdmin();
        // $this->setUserInitials();
        // $this->setUserSignature();
        $this->clearStepTitles();
        $this->clearStepStatuses();
        $this->clearUsStateAbbrevsNames();
        $this->clearKinshipStatuses();
        $this->clearPersonalInfo();
        $this->clearEmergencyContactInfo();
        $this->clearLegalInfo();
        $this->clearMedicalInfo();
        $this->clearFundingInfo();
        $this->clearReasonsForLeaving();
        $this->clearIdentificationInfo();
        $this->clearIdentificationTypes();
        $this->clearRecoveryInfo();
        $this->clearConsentForm();
        $this->clearRulesAndRegulations();
        // $this->clearConsentFormSignature();
        // dd($this->isAdmin);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
            case (4):
                $this->validateStep5();

                $this->toggleCompletedTaskIcon();
                break;
            case (5):
                $this->validateStep6();

                $this->toggleCompletedTaskIcon();
                break;
            case (6):
                $this->validateStep7();

                $this->toggleCompletedTaskIcon();
                break;
            case (7):
                $this->validateStep8();

                $this->toggleCompletedTaskIcon();
                break;
            case (8):
                $this->validateStep9();

                $this->toggleCompletedTaskIcon();
                break;
            default;
        }
        $this->nextStep();
    }

        public function toggleCompletedTaskIcon()
        {
            $this->stepStatuses[$this->stepTitles[$this->currentStep]] = 'complete';
            if ($this->currentStep < 11) {
                $this->stepStatuses[$this->stepTitles[$this->currentStep + 1]] = 'current';
            }
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

        public function setCurrentStep($index)
        {
            if ($this->user ? $this->user['userType'] == 0 : $this->stepStatuses[$this->stepTitles[$index]] == 'complete') {
                if ($this->stepStatuses[$this->stepTitles[$index]] != 'complete') {
                    $this->stepStatuses[$this->stepTitles[$index]] = 'current';
                }
                if ($this->stepStatuses[$this->stepTitles[$this->currentStep]] != 'complete') {
                    $this->stepStatuses[$this->stepTitles[$this->currentStep]] = 'pending';
                }
                $this->currentStep = $index;

            } else {
                $this->navMessageContent = 'You must complete the previous steps in order to navigate to this page!';
            }

        }

        public function clearNavMessageContent()
        {
            $this->navMessageContent = '';
        }

        public function editThisStep($index)
        {
            $this->currentStep = $index;
        }

        public function validateThisStep($index)
        {
            switch ($index) {
                case (0):
                    $this->validateStep1();
                    break;
                case (1):
                    $this->validateStep2();
                    $this->validateStep2AdditionalEmergencyContacts();
                    break;
                case (2):
                    $this->validateStep3();
                    break;
                case (3):
                    $this->validateStep4();
                    break;
                case (4):
                    $this->validateStep5();
                    break;
                case (5):
                    $this->validateStep6();
                    break;
                case (6):
                    $this->validateStep7();
                    break;
                default;
            }
            $this->isAdminEditing = false;
            $this->stepAdminIsEditing = -1;
        }

        public function editAsAdmin($index)
        {
            $this->isAdminEditing = true;
            $this->stepAdminIsEditing = $index;
        }

        private function setIsAdmin()
        {
            if ($this->user && $this->user['userType'] == 0) {
               $this->isAdmin = true;
            } else {
                $this->isAdmin = false;
            }
        }

        public function setUserInitials()
        {
            if ($this->user) {
                $first = mb_substr($this->user['firstName'], 0, 1, 'utf-8');
                $middle = $this->personalInfo != null ? mb_substr($this->personalInfo['middleInitial'], 0, 1, 'utf-8') : '';
                $last = mb_substr($this->user['lastName'], 0, 1, 'utf-8');
            } else {
                $first = mb_substr($this->personalInfo['firstName'], 0, 1, 'utf-8');
                $middle = mb_substr($this->personalInfo['middleInitial'], 0, 1, 'utf-8');
                $last = mb_substr($this->personalInfo['lastName'], 0, 1, 'utf-8');
            }
            $this->userInitials = $first.$middle.$last;
        }

        public function setUserSignature()
        {
            if ($this->user) {
                $first = $this->user['firstName'];
                $middle = $this->personalInfo != null ? $this->personalInfo['middleInitial'] : '';
                $last = $this->user['lastName'];
            } else {
                $first = $this->personalInfo['firstName'];
                $middle = $this->personalInfo['middleInitial'];
                $last = $this->personalInfo['lastName'];
            }
            $this->userSignature = $first.' '.$middle.' '.$last;
        }

        public function clearMessageContent()
        {
            $this->messageContent = null;
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
                'Rules & Regulations',
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
                'Rules & Regulations' => 'pending',
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

        private function clearReasonsForLeaving()
        {
            $this->reasonsForLeaving = array(
                '1' => 'Fulfilled rental agreement',
                '2' => 'Permanent relocation',
                '3' => 'Medical',
                '4' => 'Terminated rental agreement early',
                '5' => 'Eviction',
            );
        }

        private function clearIdentificationTypes()
        {
            $this->identificationTypes = array(
                '1' => 'Driver\'s License',
                '2' => 'Government Issued ID',
                '3' => 'Military ID',
                '4' => 'Passport',
                '5' => 'School ID card (with photo)',
            );
        }

        // personalInfo
        private function validateStep1()
        {
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
            $this->setUserInitials();
            $this->setUserSignature();
        }

        // emergencyContantInfo
        private function validateStep2()
        {
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

        // additionalEmergencyContacts
        private function validateStep2AdditionalEmergencyContacts()
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

        // legalInfo
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

        // medicalInfo
        private function validateStep4()
        {
            if ($this->medicalInfo['hasScripts'] == null) {
                $this->validate([
                    'medicalInfo.hasScripts' => 'required',
                    'medicalInfo.drugUse.drugOfChoice.*' => 'required|min:2|max:255',
                    'medicalInfo.drugUse.lastUse.*' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
                ], [
                    'medicalInfo.hasScripts.required' => 'REQUIRED!',
                    'medicalInfo.drugUse.drugOfChoice.*.required' => 'Please input a drug name or remove this field.',
                    'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
                    'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
                    'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
                    'medicalInfo.drugUse.lastUse.*.date' => 'Please select a valid last use date (YYYY-MM-DD).',
                    'medicalInfo.drugUse.lastUse.*.before_or_equal' => 'Your last use date must be before today.',
                ]);
            } else if ($this->medicalInfo['hasScripts'] == 0) {
                $this->validate([
                    'medicalInfo.hasScripts' => 'required',
                    'medicalInfo.drugUse.drugOfChoice.*' => 'required|min:2|max:255',
                    'medicalInfo.drugUse.lastUse.*' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
                ], [
                    'medicalInfo.hasScripts.required' => 'REQUIRED!',
                    'medicalInfo.drugUse.drugOfChoice.*.required' => 'Drug of choice input must be completed or removed.',
                    'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
                    'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
                    'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
                    'medicalInfo.drugUse.lastUse.*.date' => 'Please select a valid last use date (YYYY-MM-DD).',
                    'medicalInfo.drugUse.lastUse.*.before_or_equal' => 'Your last use date must be before today.',
                ]);
            } else {
                $this->validate([
                    'medicalInfo.hasScripts' => 'required',
                    'medicalInfo.medications.*' => 'required|min:2|max:255',
                    'medicalInfo.drugUse.drugOfChoice.*' => 'required|min:2|max:255',
                    'medicalInfo.drugUse.lastUse.*' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
                ], [
                    'medicalInfo.hasScripts.required' => 'REQUIRED!',
                    'medicalInfo.medications.*.required' => 'Medication input must be completed or removed.',
                    'medicalInfo.medications.*.min' => 'A medication name must contain at least two (2) characters.',
                    'medicalInfo.medications.*.max' => 'A medication name must cannot contain 255 characters.',
                    'medicalInfo.drugUse.drugOfChoice.*.required' => 'Drug of choice input must be completed or removed.',
                    'medicalInfo.drugUse.drugOfChoice.*.min' => 'A drug name must contain at least two (2) characters.',
                    'medicalInfo.drugUse.drugOfChoice.*.max' => 'A drug name must cannot contain 255 characters.',
                    'medicalInfo.drugUse.lastUse.*.required' => 'Please select a last use date.',
                    'medicalInfo.drugUse.lastUse.*.date' => 'Please select a valid last use date (YYYY-MM-DD).',
                    'medicalInfo.drugUse.lastUse.*.before_or_equal' => 'Your last use date must be before today.',
                ]);
            }
        }

        // fundingInfo
        private function validateStep5()
        {
            if ($this->fundingInfo['hasLivedWithPVSL'] == null || $this->fundingInfo['hasLivedWithPVSL'] == 0) {
                $this->validate([
                    'fundingInfo.hasLivedWithPVSL' => 'required',
                    'fundingInfo.hasPaidAdminFee' => 'required',
                    'fundingInfo.sources.*.name' => 'required|min:2|max:255',
                    'fundingInfo.sources.*.amount' => 'required|numeric|min:1',
                    'fundingInfo.sources.*.frequency' => 'required',
                    'fundingInfo.sources.*.startDate' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
                    'fundingInfo.sources.*.reference.firstName' => 'required|min:2|max:255',
                    'fundingInfo.sources.*.reference.lastName' => 'required|min:2|max:255',
                    'fundingInfo.sources.*.reference.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
                ], [
                    'fundingInfo.hasLivedWithPVSL.required' => 'REQUIRED!',
                    'fundingInfo.hasPaidAdminFee.required' => 'REQUIRED!',
                    'fundingInfo.sources.*.name.required' => 'Funding source input must be completed or removed.',
                    'fundingInfo.sources.*.name.min:2' => 'Funding source must contain at least two (2) characters.',
                    'fundingInfo.sources.*.name.max:255' => 'Funding source input cannot contain 255 characters.',
                    'fundingInfo.sources.*.amount.required' => 'Please enter a funding amount.',
                    'fundingInfo.sources.*.amount.numeric' => 'Funding amount must be a number.',
                    'fundingInfo.sources.*.amount.min:1' => 'Funding amount cannot be below $1.00.',
                    'fundingInfo.sources.*.frequency.required' => 'REQUIRED!',
                    'fundingInfo.sources.*.startDate.required' => 'Please select a start date.',
                    'fundingInfo.sources.*.startDate.date' => 'Please select a valid start date (YYYY-MM-DD).',
                    'fundingInfo.sources.*.startDate.before_or_equal' => 'Your start date must be before today.',
                    'fundingInfo.sources.*.reference.firstName.required' => 'Please enter a first name.',
                    'fundingInfo.sources.*.reference.firstName.min:2' => 'Reference first name must contain at least two (2) characters.',
                    'fundingInfo.sources.*.reference.firstName.max:255' => 'Reference first name cannot contain 255 characters.',
                    'fundingInfo.sources.*.reference.lastName.required' => 'Please enter a last name.',
                    'fundingInfo.sources.*.reference.lastName.min:2' => 'Reference last name must contain at least two (2) characters.',
                    'fundingInfo.sources.*.reference.lastName.max:255' => 'Reference last name cannot contain 255 characters.',
                    'fundingInfo.sources.*.reference.phone.required' => 'Please enter a contact number.',
                    'fundingInfo.sources.*.reference.phone.regex' => 'Please enter a valid contact number.',
                ]);
            } else {
                $this->validate([
                    'fundingInfo.hasLivedWithPVSL' => 'required',
                    'fundingInfo.moveOutDate' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
                    'fundingInfo.reasonForLeaving' => 'required',
                    'fundingInfo.hasPaidAdminFee' => 'required',
                    'fundingInfo.sources.*.name' => 'required|min:2|max:255',
                    'fundingInfo.sources.*.amount' => 'required|numeric|min:1',
                    'fundingInfo.sources.*.frequency' => 'required',
                    'fundingInfo.sources.*.startDate' => 'required|date|before_or_equal:'. Carbon::now()->format('Y-m-d'),
                    'fundingInfo.sources.*.reference.firstName' => 'required|min:2|max:255',
                    'fundingInfo.sources.*.reference.lastName' => 'required|min:2|max:255',
                    'fundingInfo.sources.*.reference.phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
                ], [
                    'fundingInfo.hasLivedWithPVSL.required' => 'REQUIRED!',
                    'fundingInfo.moveOutDate.required' => 'Please select a move out date.',
                    'fundingInfo.moveOutDate.date' => 'Please select a valid move out date (YYYY-MM-DD).',
                    'fundingInfo.moveOutDate.before_or_equal' => 'Your move out date must be before today.',
                    'fundingInfo.reasonForLeaving.required' => 'REQUIRED!',
                    'fundingInfo.hasPaidAdminFee.required' => 'REQUIRED!',
                    'fundingInfo.sources.*.name.required' => 'Funding source input must be completed or removed.',
                    'fundingInfo.sources.*.name.min:2' => 'Funding source must contain at least two (2) characters.',
                    'fundingInfo.sources.*.name.max:255' => 'Funding source input cannot contain 255 characters.',
                    'fundingInfo.sources.*.amount.required' => 'Please enter a funding amount.',
                    'fundingInfo.sources.*.amount.numeric' => 'Funding amount must be a number.',
                    'fundingInfo.sources.*.amount.min:1' => 'Funding amount cannot be below $1.00.',
                    'fundingInfo.sources.*.frequency.required' => 'REQUIRED!',
                    'fundingInfo.sources.*.startDate.required' => 'Please select a start date.',
                    'fundingInfo.sources.*.startDate.date' => 'Please select a valid start date (YYYY-MM-DD).',
                    'fundingInfo.sources.*.startDate.before_or_equal' => 'Your start date must be before today.',
                    'fundingInfo.sources.*.reference.firstName.required' => 'Please enter a first name.',
                    'fundingInfo.sources.*.reference.firstName.min:2' => 'Reference first name must contain at least two (2) characters.',
                    'fundingInfo.sources.*.reference.firstName.max:255' => 'Reference first name cannot contain 255 characters.',
                    'fundingInfo.sources.*.reference.lastName.required' => 'Please enter a last name.',
                    'fundingInfo.sources.*.reference.lastName.min:2' => 'Reference last name must contain at least two (2) characters.',
                    'fundingInfo.sources.*.reference.lastName.max:255' => 'Reference last name cannot contain 255 characters.',
                    'fundingInfo.sources.*.reference.phone.required' => 'Please enter a contact number.',
                    'fundingInfo.sources.*.reference.phone.regex' => 'Please enter a valid contact number.',
                ]);
            }
        }

        // identificationInfo
        private function validateStep6()
        {
            $this->validate([
                'identificationInfo.type' => 'required',
                'identificationInfo.state' => 'required',
                'identificationInfo.number' => 'required|min:2|max:50',
                'identificationInfo.expiration' => 'required|date',
                'identificationInfo.hasSocialCard' => 'required',
            ], [
                'identificationInfo.type.required' => 'An identification type is required.',
                'identificationInfo.state.required' => 'A state is required.',
                'identificationInfo.number.required' => 'An identification number is required.',
                'identificationInfo.number.min' => 'An identification number must contain at least 2 characters.',
                'identificationInfo.number.max' => 'An identification number contain more than 50 characters.',
                'identificationInfo.expiration.required' => 'An experiation date is required.',
                'identificationInfo.expiration.date' => 'Please select a valid experiation date.',
                'identificationInfo.hasSocialCard.required' => 'Please indicate if you possess a social security card.',
            ]);
        }

        // recoveryInfo
        private function validateStep7()
        {
            $this->validate([
                'recoveryInfo.txtGoingWell' => 'required|min:10|max:5000',
                'recoveryInfo.txtGoingBad' => 'required|min:10|max:5000',
                'recoveryInfo.txtHopesGoals' => 'required|min:10|max:5000',
            ], [
                'recoveryInfo.txtGoingWell.required' => 'Tell us what is going well in your recovery.',
                'recoveryInfo.txtGoingWell.min' => 'This field must have at least 10 characters.',
                'recoveryInfo.txtGoingWell.max' => 'This field cannot have at least 10 characters.',
                'recoveryInfo.txtGoingBad.required' => 'Tell us what is NOT going well in you recovery.',
                'recoveryInfo.txtGoingBad.min' => 'This field must have at least 10 characters.',
                'recoveryInfo.txtGoingBad.max' => 'This field cannot have at least 10 characters.',
                'recoveryInfo.txtHopesGoals.required' => 'Tell us your hopes and goals for the future.',
                'recoveryInfo.txtHopesGoals.min' => 'This field must have at least 10 characters.',
                'recoveryInfo.txtHopesGoals.max' => 'This field cannot have at least 10 characters.',
            ]);
        }

        // applicationReview
        private function validateStep8()
        {
            if ($this->rentalApplicationSignature['signed']) {
                $this->validateStep1();
                $this->validateStep2();
                $this->validateStep3();
                $this->validateStep4();
                $this->validateStep5();
                $this->validateStep6();
                $this->validateStep7();
                $this->setUserInitials();
            } else {
                $this->prevStep();
                return $this->messageContent = 'Your signature is required to continue!';
            }
        }

        // consentForm
        private function validateStep9()
        {
            // if ($this->consentFormSignature['signed']) {
            //     return;
            // } else {
                // $this->nextStep();
                // $this->toggleCompletedTaskIcon();
            // }
        }

    // personalInfo
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

    // personalInfo
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
        }

    // legalInfo
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

        public function addConviction()
        {
            array_push($this->legalInfo['convictions'], '');
        }

        public function removeConviction($index)
        {
            unset($this->legalInfo['convictions'][$index]);
            $this->legalInfo['convictions'] = array_values($this->legalInfo['convictions']);
        }

    // medicalInfo
    private function clearMedicalInfo()
    {
        $this->medicalInfo = array(
            'hasScripts' => '',
            'medications' => [],
            'drugUse' => [
                'drugOfChoice' => [
                    ''
                ],
                'lastUse' => [
                    ''
                ]
            ],
        );
    }

        public function addMedicationOnYes()
        {
            if (count($this->medicalInfo['medications']) == 0) {
                array_push($this->medicalInfo['medications'], '');
            }
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

        public function addDrugOfChoice()
        {
            array_push($this->medicalInfo['drugUse']['drugOfChoice'], '');
            array_push($this->medicalInfo['drugUse']['lastUse'], '');
        }

        public function removeDrugOfChoice($index)
        {
            unset($this->medicalInfo['drugUse']['drugOfChoice'][$index]);
            $this->medicalInfo['drugUse']['drugOfChoice'] = array_values($this->medicalInfo['drugUse']['drugOfChoice']);
            unset($this->medicalInfo['drugUse']['lastUse'][$index]);
            $this->medicalInfo['drugUse']['lastUse'] = array_values($this->medicalInfo['drugUse']['lastUse']);
        }

    // fundingInfo
    private function clearFundingInfo()
    {
        $this->fundingInfo = array(
            'hasLivedWithPVSL' => '',
            'moveOutDate' => '',
            'reasonForLeaving' => '',
            'hasPaidAdminFee' => '',
            'sources' => [
                [
                    'name' => '',
                    'amount' => '',
                    'frequency' => '0',
                    'startDate' => '',
                    'reference' => [
                        'firstName' => '',
                        'lastName' => '',
                        'phone' => '',
                    ]
                ],

            ],
        );
    }

        public function addFundingSource()
        {
            array_push($this->fundingInfo['sources'], [
                'name' => '',
                'amount' => '',
                'frequency' => '0',
                'startDate' => '',
                'reference' => [
                    'firstName' => '',
                    'lastName' => '',
                    'phone' => '',
                ]
            ]);
        }

        public function removeFundingSource($index)
        {
            unset($this->fundingInfo['sources'][$index]);
            $this->fundingInfo['sources'] = array_values($this->fundingInfo['sources']);
        }

    // identificationInfo
    private function clearIdentificationInfo()
    {
        $this->identificationInfo = array(
            'type' => '',
            'state' => '',
            'number' => '',
            'expiration' => '',
            'hasSocialCard' => '',
         );
    }

        public function toggleFilePreview($index)
        {
            $this->fileToPreview = $index;
            if ($this->previewActive == true) {
                $this->fileToPreview = '';
            }
            $this->previewActive = ! $this->previewActive;
        }

        public function toggleIDFrontPreview()
        {
            $this->previewIDFrontActive = ! $this->previewIDFrontActive;
        }

        public function toggleIDBackPreview()
        {
            $this->previewIDBackActive = ! $this->previewIDBackActive;
        }

        public function toggleHasIDCardUpload()
        {
            $this->hasIDCardUpload = ! $this->hasIDCardUpload;
        }

        public function removeFileFromUploadQue($index)
        {
            unset($this->additionalDocumentation[$index]);
            $this->additionalDocumentation = array_values($this->additionalDocumentation);
        }

    // recoveryInfo
    private function clearRecoveryInfo()
    {
        $this->recoveryInfo = array(
            'txtGoingWell' => '',
            'txtGoingBad' => '',
            'txtHopesGoals' => '',
        );
        $this->rentalApplicationSignature = array(
            'signed' => false,
            'date' => false,
        );
    }

    // consentForm
    private function clearConsentForm()
    {
        $this->consentForm = array(
            'employmentSecurityDepartment' => false,
            'socialSecurityAdministration' => false,
            'departmentOfCorrections' => false,
            'childSupportEnforcement' => false,
            'healthCareProviders' => false,
            'mentalHealthProviders' => false,
            'chemicalDependencyProviders' => false,
            'housingProgramProviders' => false,
            'departmentOfSocialHealthServices' => false,
            'collegesAndEducationProviders' => false,
            'attachedLists' => false,
            'others' => false,
        );

        $this->consentFormAdditional = array(
            'mentalHealthAC' => false,
            'hivStdAC' => false,
            'attachedListsAC' => false,
        );

        $this->consentFormSignature = array(
            'signed' => false,
            'date' => false,
        );
    }

        public function selectAllConsentForm()
        {
            if ($this->selectAllConsentForm) {
                $this->consentForm['employmentSecurityDepartment'] = true;
                $this->consentForm['socialSecurityAdministration'] = true;
                $this->consentForm['departmentOfCorrections'] = true;
                $this->consentForm['childSupportEnforcement'] = true;
                $this->consentForm['healthCareProviders'] = true;
                $this->consentForm['mentalHealthProviders'] = true;
                $this->consentForm['chemicalDependencyProviders'] = true;
                $this->consentForm['housingProgramProviders'] = true;
                $this->consentForm['departmentOfSocialHealthServices'] = true;
                $this->consentForm['collegesAndEducationProviders'] = true;
                $this->consentForm['attachedLists'] = true;
                $this->consentForm['others'] = true;
            } else {
                if ($this->consentFormSignature['signed']) {
                    $this->consentFormSignature['signed'] = false;
                }
                $this->consentForm['employmentSecurityDepartment'] = false;
                $this->consentForm['socialSecurityAdministration'] = false;
                $this->consentForm['departmentOfCorrections'] = false;
                $this->consentForm['childSupportEnforcement'] = false;
                $this->consentForm['healthCareProviders'] = false;
                $this->consentForm['mentalHealthProviders'] = false;
                $this->consentForm['chemicalDependencyProviders'] = false;
                $this->consentForm['housingProgramProviders'] = false;
                $this->consentForm['departmentOfSocialHealthServices'] = false;
                $this->consentForm['collegesAndEducationProviders'] = false;
                $this->consentForm['attachedLists'] = false;
                $this->consentForm['others'] = false;
            }
        }

        public function selectAllAdditionalConsentForm()
        {
            if ($this->initialAllAdditionalConsentForm) {
                $this->consentFormAdditional['mentalHealthAC'] = true;
                $this->consentFormAdditional['hivStdAC'] = true;
                $this->consentFormAdditional['attachedListsAC'] = true;
            } else {
                $this->consentFormAdditional['mentalHealthAC'] = false;
                $this->consentFormAdditional['hivStdAC'] = false;
                $this->consentFormAdditional['attachedListsAC'] = false;
            }
        }

        public function signConsentForm()
        {
            $result = (bool) array_product($this->consentForm);
            $result2 = (bool) array_product($this->consentFormAdditional);
            if ($result && $result2) {
                $this->consentFormSignature['signed'] = true;
            } else {
                $this->consentFormSignature['signed'] = false;
            }
        }

        public function clearConsentFormSignature()
        {
            $this->consentFormSignature['signed'] = false;
        }

    // rulesAndRegulations
    private function clearRulesAndRegulations()
    {
        $this->rulesAndRegulations = array(
            'rule1' => false,
            'rule2' => false,
            'rule3' => false,
            'rule4' => false,
            'rule5' => false,
            'rule6' => false,
            'rule7' => false,
            'rule8' => false,
            'rule9' => false,
            'rule10' => false,
            'rule11' => false,
            'rule12' => false,
            'rule13' => false,
            'rule14' => false,
            'rule15' => false,
            'rule16' => false,
            'rule17' => false,
            'rule18' => false,
            'rule19' => false,
            'rule11' => false,
            'rule20' => false,
            'rule21' => false,
            'rule22' => false,
            'rule23' => false,
            'rule24' => false,
            'rule25' => false,
            'rule26' => false,
            'rule27' => false,
            'rule28' => false,
            'rule29' => false,
            'rule30' => false,
            'rule31' => false,
            'rule32' => false,
            'rule33' => false,
            'rule34' => false,
            'rule35' => false,
            'rule36' => false,
        );
        $this->rulesAndRegulationsSignature = array(
            'signed' => false,
            'date' => false,
        );
    }

        public function selectAllRulesAndRegulations()
        {
            if ($this->selectAllRulesAndRegulations) {
                $this->rulesAndRegulations['rule1'] = true;
                $this->rulesAndRegulations['rule2'] = true;
                $this->rulesAndRegulations['rule3'] = true;
                $this->rulesAndRegulations['rule4'] = true;
                $this->rulesAndRegulations['rule5'] = true;
                $this->rulesAndRegulations['rule6'] = true;
                $this->rulesAndRegulations['rule7'] = true;
                $this->rulesAndRegulations['rule8'] = true;
                $this->rulesAndRegulations['rule9'] = true;
                $this->rulesAndRegulations['rule10'] = true;
                $this->rulesAndRegulations['rule11'] = true;
                $this->rulesAndRegulations['rule12'] = true;
                $this->rulesAndRegulations['rule13'] = true;
                $this->rulesAndRegulations['rule14'] = true;
                $this->rulesAndRegulations['rule15'] = true;
                $this->rulesAndRegulations['rule16'] = true;
                $this->rulesAndRegulations['rule17'] = true;
                $this->rulesAndRegulations['rule18'] = true;
                $this->rulesAndRegulations['rule19'] = true;
                $this->rulesAndRegulations['rule20'] = true;
                $this->rulesAndRegulations['rule21'] = true;
                $this->rulesAndRegulations['rule22'] = true;
                $this->rulesAndRegulations['rule23'] = true;
                $this->rulesAndRegulations['rule24'] = true;
                $this->rulesAndRegulations['rule25'] = true;
                $this->rulesAndRegulations['rule26'] = true;
                $this->rulesAndRegulations['rule27'] = true;
                $this->rulesAndRegulations['rule28'] = true;
                $this->rulesAndRegulations['rule29'] = true;
                $this->rulesAndRegulations['rule30'] = true;
                $this->rulesAndRegulations['rule31'] = true;
                $this->rulesAndRegulations['rule32'] = true;
                $this->rulesAndRegulations['rule33'] = true;
                $this->rulesAndRegulations['rule34'] = true;
                $this->rulesAndRegulations['rule35'] = true;
                $this->rulesAndRegulations['rule36'] = true;
            } else {
                if ($this->rulesAndRegulationsSignature['signed']) {
                    $this->rulesAndRegulationsSignature['signed'] = false;
                }
                $this->rulesAndRegulations['rule1'] = false;
                $this->rulesAndRegulations['rule2'] = false;
                $this->rulesAndRegulations['rule3'] = false;
                $this->rulesAndRegulations['rule4'] = false;
                $this->rulesAndRegulations['rule5'] = false;
                $this->rulesAndRegulations['rule6'] = false;
                $this->rulesAndRegulations['rule7'] = false;
                $this->rulesAndRegulations['rule8'] = false;
                $this->rulesAndRegulations['rule9'] = false;
                $this->rulesAndRegulations['rule10'] = false;
                $this->rulesAndRegulations['rule11'] = false;
                $this->rulesAndRegulations['rule12'] = false;
                $this->rulesAndRegulations['rule13'] = false;
                $this->rulesAndRegulations['rule14'] = false;
                $this->rulesAndRegulations['rule15'] = false;
                $this->rulesAndRegulations['rule16'] = false;
                $this->rulesAndRegulations['rule17'] = false;
                $this->rulesAndRegulations['rule18'] = false;
                $this->rulesAndRegulations['rule19'] = false;
                $this->rulesAndRegulations['rule20'] = false;
                $this->rulesAndRegulations['rule21'] = false;
                $this->rulesAndRegulations['rule22'] = false;
                $this->rulesAndRegulations['rule23'] = false;
                $this->rulesAndRegulations['rule24'] = false;
                $this->rulesAndRegulations['rule25'] = false;
                $this->rulesAndRegulations['rule26'] = false;
                $this->rulesAndRegulations['rule27'] = false;
                $this->rulesAndRegulations['rule28'] = false;
                $this->rulesAndRegulations['rule29'] = false;
                $this->rulesAndRegulations['rule30'] = false;
                $this->rulesAndRegulations['rule31'] = false;
                $this->rulesAndRegulations['rule32'] = false;
                $this->rulesAndRegulations['rule33'] = false;
                $this->rulesAndRegulations['rule34'] = false;
                $this->rulesAndRegulations['rule35'] = false;
                $this->rulesAndRegulations['rule36'] = false;
            }
        }

        public function signRulesAndRegulations()
        {
            $result = (bool) array_product($this->rulesAndRegulations);
            if ($result) {
                $this->rulesAndRegulationsSignature['signed'] = true;
            } else {
                $this->rulesAndRegulationsSignature['signed'] = false;
            }
        }

        public function clearRulesAndRegulationsSignature()
        {
            $this->rulesAndRegulationsSignature['signed'] = false;
        }

    public function render()
    {
        return view('livewire.rental-application-portal');
    }
}
