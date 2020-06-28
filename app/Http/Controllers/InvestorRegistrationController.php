<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvestorRegistration;
use App\Address;
use App\InvestorRegistrationContactPerson;
use App\InvestorRegistrationContact;
use App\InvestorRegistrationAddressList;
use App\InvestorRegistrationStatusTracking;

class InvestorRegistrationController extends Controller
{
    /**
     * Show mentor registration form
     *
     * @return View view
     */
        

    public function showRegistrationForm()
    {
        return view('form.registration.investor.investor_registration_form');
    }

    /**
     * Save mentor registration
     *
     * @param Request $request
     */
    public function saveRegistration(Request $request)
    {
        // validate
        $validatedData = $request->validate([
            'companyRegisteredName' => "required|max:255",
            'companyBusinessRegNo' => "required|alpha_num", //alphanumeric only
            'AddressLine1' => "required|max:225",
            'AddressLine2' => "required|max:225",
            'AddressCity' => "required|max:150",
            'AddressState' => "required",
            'AddressZip' => "required",
            'companyPaidUpCap' => "required",
            'companyTel' => "required|max:11",
            'companyFax' => "required|max:11",
            'companyHP' => "required|max:11",
            'companyEmail' => "required|email|max:150",
            'companyBusinessClassification' => "required|max:150",
            'companyBusinessDesc' => "required|max:1000",
            'companyAreaOfInterest' => "required|max:3000",
            'companyAttendSession' => "required"
            ]);

        // save investor registration
        $investorRegistration = InvestorRegistration::createNewInvestorRegistration(
            $request-> companyRegisteredName,
            $request-> companyBusinessRegNo,
            $request-> companyPaidUpCap,
            $request-> companyWebsite,
            $request-> companyBusinessClassification,
            $request-> companyBusinessDesc,
            $request-> companyAreaOfInterest,
            $request-> companyAttendSession,
        );

        $investorRegistrationID = $investorRegistration-> id;
        // save and attach address to investor registration
        $registeredAddress = Address::createNewAddress(// registered address
            $request-> registerAddressLine1,
            $request-> registerAddressLine2,
            $request-> registerAddressCity,
            $request-> registerAddressZip,
            $request-> registerAddressState
        );
        InvestorRegistrationAddressList::newRegisteredAddress($investorRegistrationID, $registeredAddress-> id);

        if (!($request-> has('sameAddress')) && $request-> sameAddress != "on") {
            $businessAddress = Address::createNewAddress(// business address
                $request-> businessAddressLine1,
                $request-> businessAddressLine2,
                $request-> businessAddressCity,
                $request-> businessAddressZip,
                $request-> businessAddressState
            );
            InvestorRegistrationAddressList::newBusinessAddress($investorRegistrationID, $businessAddress-> id);
        } else {
            InvestorRegistrationAddressList::newBusinessAddress($investorRegistrationID, $registeredAddress-> id);
        }

        // save investor contact person
        InvestorRegistrationContactPerson::createNewContactPerson($investorRegistrationID, $request-> companyContactPersonName, $request-> companyContactPersonPosition);

        // save investor contact
        $companyHP = $request-> companyHP;
        if (isset($companyHP) == true && !($companyHP === '')) {
            InvestorRegistrationContact::newHPContact($investorRegistrationID, $companyHP);
        }
        $companyTel = $request-> companyTel;
        if (isset($request-> companyTel) == true && !($request-> companyTel === '')) {
            InvestorRegistrationContact::newTelContact($investorRegistrationID, $companyTel);
        }
        $companyEmail = $request-> companyEmail;
        if (isset($request-> companyEmail) == true && !($request-> companyEmail === '')) {
            InvestorRegistrationContact::newEmailContact($investorRegistrationID, $companyEmail);
        }
        $companyFax = $request-> companyFax;
        if (isset($request-> companyFax) == true && !($request-> companyFax === '')) {
            InvestorRegistrationContact::newFaxContact($investorRegistrationID, $companyFax);
        }

        InvestorRegistrationStatusTracking::newRegisteredStatus($investorRegistrationID);

        // redirect

        return ('success, investor');
    }
}
