<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\MentorRegistration;
use App\InternalMentorDetail;
use App\CenterFaculty;
use App\MentorRegistrationExperience;
use App\MentorRegistrationStatusTracking;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Validation\ValidationException;

class MentorRegistrationController extends Controller
{
    /**
     * Show mentor registration form
     *
     * @return View view
     */
    public function showRegistrationForm()
    {
        $centerFaculty = CenterFaculty::all()-> pluck('id', 'name');
        return view('form.registration.mentor.mentor_registration_form', ['centerFaculty' => $centerFaculty]);
    }

    /**
     * Save mentor registration
     *
     * @param Request $request
     */
    public function saveRegistration(Request $request)
    {
        // return dd($request-> mentorExpText);
        // return dd($request);
        // validation

        $validatedData = $request->validate([
            'mentorName' => "required|alpha|max:255",
            'mentorICPass' => "required|max:13", //validation for IC only
            'mentorContact' => "required|max:255",
            'mentorEmail' => "required|emailmax:255",
            'mentorHasExp' => "required",
            'mentorExpText' => "required|max:1000",
            'mentorExpEntrepreneuship' => "required|max:1000",
            'mentoring' => "required",
            'howHearProgram' => "required|max:1000"
        ]);

        // check company exist and save
        if ($request-> mentorHasCompany == "true") {
            $companyID = Company::checkCompanyIsExistOrCreateNew($request-> mentorCompanyRegNo, $request-> mentorCompanyName)-> id;
        } else {
            $companyID = null;
        }


        // save mentor registration
        $newMentorRegistration = MentorRegistration::createNewMentorRegistration(
            $request-> mentorCategory,
            $request-> mentorName,
            $request-> mentorICPass,
            $request-> mentorContact,
            $request-> mentorEmail,
            $companyID,
            $request-> mentorPosition,
            $request-> mentorCompanyEmail
        );

        $newMentorRegistrationID = $newMentorRegistration-> id;

        //save mentor upload file
        $path = 'mentor_registration/' . $newMentorRegistrationID;
        
        $newMentorRegistration->saveUpload(FileUploadController::upload($path, $request-> mentorFile, 'mentor_registration_image.png'));
        
        // set mentor type sync pivot table
        if ($request-> has('mentorTypeBusi') && $request-> mentorTypeBusi == 'on') {// for business mentor
            $newMentorRegistration-> syncMentorTypeBusiness();
        }
        if ($request-> has('mentorTypeTech') && $request-> mentorTypeTech == 'on') {// for technical mentor
            $newMentorRegistration-> syncMentorTypeTechnical();
        }
        // if internal save internal mentor detail
        if ($request-> mentorCategory == 1) {
            InternalMentorDetail::createNewInternalMentorDetail($newMentorRegistrationID, (int)$request-> mentorDepartment);
        }
        // save mentor experience
               
        MentorRegistrationExperience::createNewMentorRegistrationExperience(
            $newMentorRegistrationID,
            $request-> mentorHasExp,
            $request-> mentorExpText,
            $request-> mentorExpEntrepreneuship,
            $request-> mentoring,
            $request-> howHearProgram
        );
        MentorRegistrationStatusTracking::newRegisteredStatus($newMentorRegistrationID);
        
        // redirect registration summary

        return 'success, mentor';
    }

    /**
     * Show termination confirmation form
     *
     * @param Integer $id
     *
     * @return View view
     */
    public function showTerminationForm($id)
    {
        MentorRegistrationStatusTrackingController::decrypt($id);

        return view('');
    }

    /**
     * Terminate the mentor registration
     *
     */
    public function terminateRegistration(Request $request)
    {
        $decryptedID = $this-> decrypt($request-> id);
        // Terminate the mentor registration
        MentorRegistration::terminateMentorRegistration($decryptedID);

        MentorRegistrationStatusTracking::newTerminatedStatus($this-> find($decryptedID));
        // Notify registrant successfull termination of the mentor registration
        EmailController::mentorRegistrationTermination();
    }

    /**
     * Find and return mentor registration
     *
     * @param Interger id
     */
    public function find($id)
    {
        return MentorRegistration::find($id);
    }

    /**
     * Decrypted encrypted value
     *
     * @param String
     *
     * @return Mixed
     */
    public function decrypt($encryptedValue)
    {
        try {
            return Crypt::decrypt($encryptedValue);
        } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(401);
        }
    }
}
