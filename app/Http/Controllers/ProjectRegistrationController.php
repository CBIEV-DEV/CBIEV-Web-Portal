<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public  $project;
    public  $member;
    public  $supervisor;
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
        return view('form.registration.project_registration.project_registration_form');
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
        $this->sanitize($request);// sanitize $request input

        $teamLeader = $this->saveProjectTeamleader($request);

        $projectRegistration = ProjectRegistration::saveRegistration($request-> projectTitle, $request-> projectstate, $request-> prodSol, $request-> targetMark, $request-> projectCategory, $teamLeader->id);

        $this->saveProjectParticipant($request, $projectRegistration);
        $this->saveProjectSupervisor($request, $projectRegistration);
        $this->statusTrackingSubmited($projectRegistration-> id);
        ProjectRegistrationStatusTracking::saveSubmitedStatus($projectRegistration-> id);

        Mail::to([$teamLeader-> email, $teamLeader-> company_email])
            ->later(self::tenSecondDelayTime(), new SuccessProjectRegistrationNotification($teamLeader-> name, $projectRegistration-> project_title, $projectRegistration-> id));

    }
    
    /**
     * To save project leader into database
     *
     * @param Request $request
     *
     */
    public function saveProjectTeamleader($request)
    {
        switch ($request-> leaderType) {
            case 1:
            case 2:
                $this-> companyID = 1;
                break;
            case 3:
            case 4:
                if ($request->leaderHasCompany == true) {
                    $companyID = Company::saveCompany($request->leaderCompanyRegNo ,$request->leaderCompanyName)-> id;
                }
            default:
                $companyID = null;
                break;
        }

        return ProjectMember::saveMember(
            $request-> leaderIC, $request-> leaderType, $request-> leaderName, $request-> leaderContact, $request-> leaderEmail, $request-> leaderUCID, $this-> company_id, $request-> leaderCompanyEmail, $request-> leaderPosition, CenterFaculty::getIDByName($request-> leaderDepartment), Programme::getIDByProgrammeName($request-> leaderProgramme)
        );
    }

    /**
     * To save project registration into database
     *
     * @param Request $request
     * @param ProjectParticipant $teamLeader
     *
     * @return ProjectRegistration $projectRegistration
     *
     */
    public function saveProjectRegistration($request, $teamLeader)
    {
        $projectRegistration = ProjectRegistration::projectRegistration();

        $projectRegistration -> project_title = $request-> projectTitle;
        $projectRegistration -> problem_statement = $request-> projectstate;
        $projectRegistration -> product_solution = $request-> prodSol;
        $projectRegistration -> target_market = $request-> targetMark;

        switch ($request-> projectCategory) {
            case '1':
                $projectRegistration -> category_id = 1;
                break;
            case '2':
                $projectRegistration -> category_id = 2;
                break;
            case '3':
                $projectRegistration -> category_id = 3;
                break;
            case '4':
                $projectRegistration -> category_id = 4;
                break;
            case '5':
                $projectRegistration -> category_id = 6;
                break;
            case '6':
                $projectRegistration -> category_id = 7;
                break;
            case '7':
                $projectRegistration -> category_id = 8;
                break;
        }

        $projectRegistration -> team_leader = $teamLeader -> id;
        $projectRegistration -> save();

        $projectRegistration -> projectMember() -> sync($teamLeader, false);

        return $projectRegistration;
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
        if ($request-> participantIndex > 0) {
            for ($i=0; $i < $request-> participantIndex; $i++) {
                
                switch ($request-> memberType[$i]) {
                    case 1:
                    case 2:
                        $this-> companyID = 1;
                        break;
                    case 3:
                    case 4:
                        if ($request->memberHasCompany == true) {
                            $this-> companyID = Company::saveCompany($request-> memberCompanyRegNo ,$request-> memberCompanyName)-> id;
                        }
                    default:
                        $companyID = null;
                        break;
                }
        
                $projectRegistration -> projectMember() 
                -> sync(ProjectMember::saveMember(
                    $request-> memberIC[$i], $request-> memberType[$i], $request-> memberName[$i], $request-> memberContact[$i], $request-> memberEmail[$i], $request-> memberUCID[$i], $this-> company_id, $request-> memberCompanyEmail[$i], $request-> memberPosition[$i], CenterFaculty::getIDByName($request-> leaderDepartment), Programme::getIDByProgrammeName($request-> memberProgramme[$i])
                ), false);
            }
        }
    }

    /**
     * To save each supervisor and link with project registration
     *
     */
    public function saveProjectSupervisor($request, $projectRegistration)
    {
        if ($request-> supervisorIndex > 0) {
            for ($i=0; $i < $request-> supervisorIndex; $i++) {
                switch ($request-> supervisorType[$i]) {
                    case 2:
                        $this->center_faculty_id =  CenterFaculty::getIDByName($request-> supervisorDepartmentCode[$i] );
                        $this->companyID =  1;
                        break;
                    case 3:
                    case 4:
                        $this-> center_faculty_id =  null;

                        if ($request-> supervisorHasCompany[$i] == true) {
                            $this-> companyID = Company::saveCompany($request-> supervisorCompanyRegNo ,$request-> supervisorCompanyName)-> id;
                        }else {
                            $this-> companyID = null;
                        }
                    default:
                        $this-> companyID = null;
                        break;
                }
            
                $projectRegistration -> projectSupervisor() 
                -> sync(ProjectSupervisor::saveProjectSupervisor($request-> supervisorIC[$i], $request-> supType[$i], $request-> supervisorName[$i], $request-> supervisorContact[$i], $request-> supervisorEmail[$i], $this-> companyID, $request-> supervisorCompanyEmail[$i], $request-> supervisorPosition[$i], $request-> supervisorUCID[$i], $this-> center_faculty_id), false);
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
}