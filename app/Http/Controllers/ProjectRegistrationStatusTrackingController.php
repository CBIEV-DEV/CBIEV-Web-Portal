<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProjectRegistration;
use App\ProjectRegistrationStatusTracking;
use Illuminate\Support\Facades\DB;
use App\CenterFaculty;
use App\CBIEVStaff;
use App\Jobs\PRRecommendationAutoApprove;

use App\PRDeanHeadRecommendation;
use App\PRDirectorApproval;
use App\PRManagerRecommendation;
use App\PRSupervisorRecommendation;

class ProjectRegistrationStatusTrackingController extends Controller
{
    /**
     * 
     */
    public function startApprovalProcess($id, $stage)
    {
        $projectRegis = ProjectRegistration::find($id);
        $stage_ = (int)$stage;
        switch ($stage_) {
            case 1:
                $this-> startSupervisorRecommendation($projectRegis);
                break;
            case 2:
                $this-> startDeanHeadRecommendation($projectRegis);
                break;
            case 3:
                $this-> startManagerRecommendation($projectRegis);
                break;
            case 4:
                $this-> startDirectorApproval($projectRegis);
                break;
            default:
                abort(401);
                break;
        }
        return redirect()->back();
    }

    /**
     *  To start supervisor recommendation
     * @param ProjectRegistration $projectRegis
     * 
     */
    public function startSupervisorRecommendation($projectRegis)
    {
        $statusID = ProjectRegistrationStatusTracking::saveSupervisorRecStatus($projectRegis-> id)-> id;
        foreach ($projectRegis-> projectSupervisor as $supervisor) {
            
            $supRecID = PRSupervisorRecommendation::saveNewSupervisorRecommendation( $supervisor-> id, $statusID);
            EmailController::supervisorRecommendationInvitation($supervisor-> email, $supervisor-> company_email, $supRecID, $supervisor-> name);
        }

        // PRRecommendationAutoApprove::dispatch($statusID)->delay(now()-> addSeconds(100));
    }

    /**
     *  To start dean/head recommendation
     * @param UnsignedBigInt $projectRegisID
     * 
     */
    public function startDeanHeadRecommendation($projectRegisID)
    {
        $statusID = ProjectRegistrationStatusTracking::saveDeanHeadRecStatus($projectRegisID-> id)-> id;

        foreach ($this-> centerFacultyEntryCount($projectRegisID) as $entryCount) {
            $deanHead = CenterFaculty::find($entryCount-> center_faculty_id)-> deanHead;
            $deanHeadRecID = PRDeanHeadRecommendation::saveNewDeanHeadRecommendation($deanHead-> id, $statusID);
            EmailController::deanheadRecommendation($deanHead-> email, $deanHeadRecID, $deanHead-> name);
        }

        // PRRecommendationAutoApprove::dispatch($statusID)->delay(now()-> addSeconds(100));        
    }

    /**
     * 
     */
    public function startManagerRecommendation($projectRegisID)
    {
        $statusID = ProjectRegistrationStatusTracking::saveManagerRecStatus($projectRegisID)-> id;
        $manager = CBIEVStaff::where('role', 2)-> get()-> first();
        $managerRecommendationID = PRManagerRecommendation::saveNewManagerRecommendation($manager->id, $statusID);
        EmailController::managerRecommendation($manager-> email, $managerRecommendationID, $manager-> name);

        // PRRecommendationAutoApprove::dispatch($statusID)->delay(now()-> addSeconds(100));
    }

    /**
     * 
     */
    public function startDirectorApproval($projectRegisID)
    {
        $statusID = ProjectRegistrationStatusTracking::saveDirectorApprovalStatus($projectRegisID)-> id;;
        $director = CBIEVStaff::where('role', 3)-> get()-> first();
        $directorApprovalID = PRDirectorApproval::saveNewDirectorApproval($director->id, $statusID,);
        EmailController::directorApproval($director-> email, $directorApprovalID, $director-> name);

    }

    /**
     * Get Center/Faculty/Department Member Entry Count
     */
    public function centerFacultyEntryCount($projectRegisID)
    {
        return DB::select('SELECT m.center_faculty_id as center_faculty_id, COUNT(m.center_faculty_id) as entry_count
                                FROM project_members m, pr_member_list l
                                WHERE  l.project_member_id = m.id 
                                AND l.project_registration_id '. $projectRegisID .
                                ' GROUP BY m.center_faculty_id
                                HAVING COUNT(m.center_faculty_id) > 0');

    }
}
