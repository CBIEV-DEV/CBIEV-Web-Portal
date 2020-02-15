<?php

namespace App\Http\Controllers\Registration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MentorRegistration;

class StaffMentorRegistrationController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth:cbiev-staff');
    }
    /**
     * Show mentor registration list view
     * 
     */
    public function showMentorRegistrationList()
    {
        return view('CBIEVStaff.registration.mentor.mentor_regis_list')->with('mentorRegistrations', MentorRegistration::all());
    }
    /**
     * Show project registration list view
     * 
     */
    public function showMentorRegistrationDetail($id)
    {
        // return dd(MentorRegistration::find($id)-> statusTracking-> where('mentor_registration_status', 2)->first()-> deanHeadRecommendation);
        // return dd(MentorRegistration::find($id)-> statusTracking-> where('mentor_registration_status', 2)->first()-> deanHeadRecommendation->first()-> deanHeadRecommendationLog-> sortByDesc('created_at')-> first());
        return view('CBIEVStaff.registration.mentor.mentor_regis_detail')->with('mentorRegis', MentorRegistration::find($id));
    }
}
