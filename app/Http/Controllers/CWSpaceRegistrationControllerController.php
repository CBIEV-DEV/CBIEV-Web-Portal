<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CWRegistrationProjectMemberControllerController;
use App\CWRegistrationProjectSupervisorControllerController;
use App\CWSProject;

class CWSpaceRegistrationControllerController extends Controller
{


    //To show project registration page to user1

    public function showRegistrationForm()
    {
        return view('form.registration.co_working_space.coworkingspace');
    }

    //To save coworkingspace category into database
    public function saveCoworkingSpaceCategory(Request $request)
    {
        return CWSCatergory::firstOrCreate(
        ['category' =>  $request-> coworkingspaceCategory]
        );
    }

    //To save coworkingspace leader into database
    public function saveCoworkingSpaceLeader(Request $request)
    {
        return CWSLeader::firstOrCreate(
            ['ic' => $request-> coworkingspaceIcNo],
            [
                'team_leader' => $request-> coworkingspaceleadername,
                'contact' => $request-> coworkingspacephone,
                'email' => $request-> coworkingspaceemail,
                'uc_id' => $request-> coworkingspaceleaderUCID,
                'center_faculty_id' => $request-> coworkingspaceleaderDepartment,
                'programme_study' => $request-> coworkingspaceleaderProgramme,
                'CWS_IC' => $request-> coworkingspaceLeaderIcNo,
            ]
        ); 
    }

    //To save coworkingspace member into database
    public function saveCoworkingSpaceMember(Request $request)
    {
        return CWSMember::firstOrCreate(
            [
                'name' => $request-> coworkingspacememberName,
                'contact' => $request-> coworkingspacememberContact,
                'email' => $request-> coworkingspacememberEmail,
                'uc_id' => $request-> coworkingspacememberUCID,
                'center_faculty_id' => $request-> coworkingspacememberDepartment,
                'programme_study' => $request-> coworkingspacememberProgramme,
            ]
        ); 
    }

    public function saveCoworkingSpaceSupervisor(Request $request)
    {
        return CWSSupervisor::firstOrCreate(
            [
                'name' => $request-> coworkingspacesupervisorname,
                'contact' => $request-> coworkingspacesupervisorphone,
                'email' => $request-> coworkingspacesupervisorEmail,
                'uc_id' => $request-> coworkingspacestaffID,
                'center_faculty_id' => $request-> coworkingspacestafffaculty,
            ]
        ); 
    }

    public function saveCoworkingSpaceProject(Request $request)
    {
        return CWSProject::firstOrCreate(
            [
                'name' => $request-> coworkingspaceprojectTitle,
                'contact' => $request-> coworkingspaceprojectstate,
                'email' => $request-> coworkingspacedurationend,
                'uc_id' => $request-> coworkingspacedurationstart,
            ]
        ); 
    }

public function saveRegistration(Request $request){
        return 'Coworking Space Registration, Success';
    }
    

    public function submitForm()
    {
        return dd('yes');
        
    }
}
