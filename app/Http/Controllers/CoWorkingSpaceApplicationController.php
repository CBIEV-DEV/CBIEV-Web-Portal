<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CWRegistrationProjectMemberController;
use App\CoWorkingSpaceApplication;
use App\CWRecommendation;
class CoWorkingSpaceApplicationController extends Controller
{
    public $memberProgrammes;
    /**
     *
     * To show project registration page to user
     *
     * @return view
     */
    public function showRegistrationForm()
    {
        return view('form.registration.co_working_space.coworkingspace');// return view for co-working space application form
    }
    public function saveRegistration(Request $request)
    {
        // return dd($request);

        $this->sanitize($request);

        $application = CoWorkingSpaceApplication::saveApplication(
            $request-> coworkingspaceCategory, 
            $request-> coworkingspaceprojectTitle, 
            $request-> coworkingspaceprojectstate, 
            $request-> coworkingspacedurationstart, 
            $request-> coworkingspacedurationend, 
        );

        // Team Leader
        $leader = CWRegistrationProjectMemberController::saveMember(
            $request-> coworkingspaceleadername, 
            $request-> coworkingspaceIcNo, 
            $request-> coworkingspacephone, 
            $request-> coworkingspaceemail, 
            $request-> coworkingspaceleaderUCID, 
            $request-> coworkingspaceleaderDepartmentCode, 
            $request-> coworkingspaceleaderProgramme, 1);


        // Supervisor
        $supervisor = CWRegistrationProjectMemberController::saveMember(
            $request-> coworkingspacesupervisorname, 
            "", 
            $request-> coworkingspacesupervisorphone,
            $request-> coworkingspacesupervisorEmail, 
            $request-> coworkingspacestaffID, 
            $request-> coworkingspacestafffaculty, 
            "", 2);

        for($i = 0; $i < $request-> participantIndex; $i++)
        {
            $member = CWRegistrationProjectMemberController::saveMember(
                $request-> memberName[$i], 
                $request-> coworkingspacememberIC[$i], 
                $request-> coworkingspacememberContact[$i], 
                $request-> coworkingspacememberEmail[$i], 
                $request-> coworkingspacememberUCID[$i], 
                $request-> coworkingspacememberDepartmentCode[$i], 
                $this-> memberProgrammes[$i], 3);

            $application-> projectMember()-> sync($member, false);

        }

        
        $application-> projectMember()-> sync($leader, false);
        $application-> projectMember()-> sync($supervisor, false);

        CWRecommendation::saveNew(0,0,null,null,$application-> id);
        return dd("Yes");
    }

    public function sanitize(Request $request){

        if ($request->has('coworkingspacememberProgramme')) {
         $this->memberProgrammes = array_values(array_filter($request-> coworkingspacememberProgramme));// remove null array item
        }
    }

    public function getFacultyID($faculty)
    {
        switch ($faculty) {
            case 'Faculty of Accountancy, Finance and Business':
                return 17;
                break;
            case 'Faculty of Applied Science':
                return 18;
                break;
            case 'Faculty of Build Environment':
                return 19;
                break;
            case 'Faculty of Communication and Creative Industry':
                return 20;
                break;
            case 'Faculty of Computing and Information Technology':
                return 21;
                break;
            case 'Faculty of Social Science and Humanities':
                return 22;
                break;
            // case '':
            //     return ;
            //     break;

        }
    }
}
