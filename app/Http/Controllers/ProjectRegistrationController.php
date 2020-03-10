<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\ProjectMember;
use App\Programme;
use App\ProjectRegistration;
use App\ProjectSupervisor;
use App\Company;
use App\CenterFaculty;
use App\Mail\SuccessProjectRegistrationNotification;
use App\ProjectRegistrationStatusTracking;


class ProjectRegistrationController extends Controller
{
    private  $memberProgrammes = [];

    private $company_id;
    private $center_faculty_id;
         
    /**
     *
     * To show project registration page to user
     *
     * @return view
     */
    public function showRegistrationPage()
    {
        return view('form.registration.project_registration.project_registration_form');// return view for project registration form
    }

    /**
     * To sanitize input
     * 
     * @param Request $request
     */
    public function sanitize(Request $request){

       if ($request->has('memberProgramme')) {
        $this->memberProgrammes = array_values(array_filter($request-> memberProgramme));// remove null array item
       }
    }

    /**
     *
     * To save project registration page into database
     *
     * @param Request $request
     *
     * @return view
     */
    public function submitRegistration(Request $request)
    {
        // Sanitize input from request
        $this->sanitize($request);// sanitize $request input
        // Save Team Leader
        $teamLeader = $this->saveProjectTeamleader($request);
        // Save Project Registration
        $projectRegistration = ProjectRegistration::saveRegistration($request-> projectTitle, $request-> projectstate, $request-> prodSol, $request-> targetMark, $request-> projectCategory, $teamLeader->id);
        $projectRegistration-> sync($teamLeader, false);// sync project registration with team leader
        // Save Project Participants
        $this->saveProjectParticipant($request, $projectRegistration);
        // Save Project Supervisor
        $this->saveProjectSupervisor($request, $projectRegistration);
        // Save Project Status 'Submited'
        ProjectRegistrationStatusTracking::saveSubmitedStatus($projectRegistration-> id);
        // Send Notification Mail to Team Leader
        Mail::to([$teamLeader-> email, $teamLeader-> company_email])
            ->later(10, new SuccessProjectRegistrationNotification($teamLeader-> name, $projectRegistration-> project_title, $projectRegistration-> id));

        return redirect(route('registration.redirect'));
    }
    
    /**
     * To save project leader into database
     *
     * @param Request $request
     *
     */
    public function saveProjectTeamleader($request)
    {
        // Set Company ID according to leader type
        switch ($request-> leaderType) {
            case 1:
            case 2:
                $this-> companyID = 1; // 1 and 2 are student and staff of TARUC, Company ID 1 is TARUC
                break;
            case 3:
            case 4:
                if ($request->leaderHasCompany == true) {
                    $companyID = Company::saveCompany($request->leaderCompanyRegNo ,$request->leaderCompanyName)-> id;// Save company and get company id
                }
            default:
                $companyID = null;
                break;
        }

        return ProjectMember::saveMember(
            $request-> leaderIC, $request-> leaderType, $request-> leaderName, $request-> leaderContact, $request-> leaderEmail, $request-> leaderUCID, $this-> company_id, $request-> leaderCompanyEmail, $request-> leaderPosition, CenterFaculty::getIDByName($request-> leaderDepartment), Programme::getIDByProgrammeName($request-> leaderProgramme)
        );// Save team leader and return team leader 
    }

    /**
     * To save each participant into database and link with project registration
     *
     * @param Request $request
     * @param ProjectRegistration $projectRegistration
     *
     */
    public function saveProjectParticipant($request, $projectRegistration)
    {   
        if ($request-> participantIndex > 0) {// Check if participant is more than 0
            for ($i=0; $i < $request-> participantIndex; $i++) {// Loop to save each participant
                
                switch ($request-> memberType[$i]) {// Set Company ID according to participant type
                    case 1:
                    case 2:
                        $this-> companyID = 1;// 1 and 2 are student and staff of TARUC, Company ID 1 is TARUC
                        break;
                    case 3:
                    case 4:
                        if ($request->memberHasCompany == true) {
                            $this-> companyID = Company::saveCompany($request-> memberCompanyRegNo ,$request-> memberCompanyName)-> id;// Save company and get company id
                        }
                    default:
                        $companyID = null;
                        break;
                }
        
                $projectRegistration -> projectMember() 
                -> sync(ProjectMember::saveMember(
                    $request-> memberIC[$i], $request-> memberType[$i], $request-> memberName[$i], $request-> memberContact[$i], $request-> memberEmail[$i], $request-> memberUCID[$i], $this-> company_id, $request-> memberCompanyEmail[$i], $request-> memberPosition[$i], CenterFaculty::getIDByName($request-> memberDepartment[$i]), Programme::getIDByProgrammeName($this-> memberProgrammes[$i])
                ), false);// Save team leader and return team leader 
            }
        }
    }

    /**
     * To save each supervisor and link with project registration
     *
     */
    public function saveProjectSupervisor($request, $projectRegistration)
    {
        if ($request-> supervisorIndex > 0) {// Check if project supervisor is more than 0
            for ($i=0; $i < $request-> supervisorIndex; $i++) {// Loop to save each participant
                switch ($request-> supType[$i]) {// Set Company ID according to supervisor type and set faculty id
                    case 2: 
                        $this->center_faculty_id =  CenterFaculty::getIDByName($request-> supervisorDepartmentCode[$i] );// set faculty id
                        $this->companyID =  1;// 2 is staff, Company ID 1 = taruc
                        break;
                    case 3:
                    case 4:
                        $this-> center_faculty_id =  null;// 3 and 4 are alumni and public, doesn't belongs to tarcu, hence not under any faculty or center 

                        if ($request-> supervisorHasCompany[$i] == true) {
                            $this-> companyID = Company::saveCompany($request-> supervisorCompanyRegNo ,$request-> supervisorCompanyName)-> id;// save company and get company id 
                        }else {
                            $this-> companyID = null;// if no company, set to null
                        }
                    default:
                        $this-> companyID = null;
                        break;
                }
            
                $projectRegistration -> projectSupervisor() 
                -> sync(ProjectSupervisor::saveProjectSupervisor($request-> supervisorIC[$i], $request-> supType[$i], $request-> supervisorName[$i], $request-> supervisorContact[$i], $request-> supervisorEmail[$i], $this-> companyID, $request-> supervisorCompanyEmail[$i], $request-> supervisorPosition[$i], $request-> supervisorUCID[$i], $this-> center_faculty_id), false);// Save supervisor and return supervisor 
            }
        }
    }

    /**
     * 
     */
    public function showLoginForm()
    {
        return view('auth.project_registration.project_registration_login');
    }

    public function success()
    {
        return view('form.registration.redirect');
    }
}