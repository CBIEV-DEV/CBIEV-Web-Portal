<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use App\Mail\ProjectRegistrationRecommendationInvitation;

use App\ProjectRegistration;
use App\ProjectRegistrationStatusTracking;
use Illuminate\Support\Facades\DB;
use App\CenterFaculty;
use App\CBIEVStaff;
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
            
            Mail::to([$supervisor-> email, $supervisor-> company_email])
                ->later($this-> tenSecondDelayTime(),new ProjectRegistrationRecommendationInvitation($supervisor-> name, $this-> generateURL(PRSupervisorRecommendation::saveNewSupervisorRecommendation( $supervisor-> id, $statusID)-> id, 1)));//pass 1 as type supervisor));
        }

        // PRRecommendationAutoApprove::dispatch($statusID)->delay(now()-> addSeconds(100));
    }

    /**
     *  To start dean/head recommendation
     * @param UnsignedBigInt $projectRegisID
     * 
     */
    public static function startDeanHeadRecommendation($projectRegisID)
    {
        $statusID = ProjectRegistrationStatusTracking::saveDeanHeadRecStatus($projectRegisID)-> id;

        foreach (self::centerFacultyEntryCount($projectRegisID) as $entryCount) {
            $deanHead = CenterFaculty::find($entryCount-> center_faculty_id)-> deanHead;
  ;
            Mail::to($deanHead-> email)
                ->later(self::tenSecondDelayTime(),new ProjectRegistrationRecommendationInvitation($deanHead-> name, self::generateURL(PRDeanHeadRecommendation::saveNewDeanHeadRecommendation($deanHead-> id, $statusID)-> id, 2) ));//pass 2 as type dean/head
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

        Mail::to([$manager-> email])
            ->later($this-> tenSecondDelayTime(),new ProjectRegistrationRecommendationInvitation($manager-> name, $this-> generateURL(PRManagerRecommendation::saveNewManagerRecommendation($manager->id, $statusID)-> id, 3)));//pass 3 as type manager

        // PRRecommendationAutoApprove::dispatch($statusID)->delay(now()-> addSeconds(100));
    }

    /**
     * 
     */
    public function startDirectorApproval($projectRegisID)
    {
        $statusID = ProjectRegistrationStatusTracking::saveDirectorApprovalStatus($projectRegisID)-> id;;
        $director = CBIEVStaff::where('role', 3)-> get()-> first();

        Mail::to([$director-> email])
            ->later(self::tenSecondDelayTime(),new ProjectRegistrationRecommendationInvitation($director-> name, $this-> generateURL(PRDirectorApproval::saveNewDirectorApproval($director->id, $statusID)-> id, 4)));

    }

    /**
     * 
     */
    public function startRerunRecommendation($projectRegisID)
    {
        $statusID = ProjectRegistrationStatusTracking::saveDirectorApprovalStatus($projectRegisID)-> id;;
        $director = CBIEVStaff::where('role', 3)-> get()-> first();

        Mail::to([$director-> email])
            ->later(self::tenSecondDelayTime(),new ProjectRegistrationRecommendationInvitation($director-> name, $this-> generateURL(PRDirectorApproval::saveNewDirectorApproval($director->id, $statusID)-> id, 4)));

    }

    /**
     * Get Center/Faculty/Department Member Entry Count
     */
    public static function centerFacultyEntryCount($projectRegisID)
    {
        return DB::select('SELECT m.center_faculty_id as center_faculty_id, COUNT(m.center_faculty_id) as entry_count
                                FROM project_members m, pr_member_list l
                                WHERE  l.project_member_id = m.id 
                                AND l.project_registration_id ='. $projectRegisID .
                                ' GROUP BY m.center_faculty_id
                                HAVING COUNT(m.center_faculty_id) > 0');

    }

    /**
     * Generate URL for project registration recommendation and approval
     * 
     * @param int $recID
     * @param int $type
     */
    public static function generateURL($recID, $type)
    {
        // encrypt the recommendatiom id and type
        $cryptedRecID = Crypt::encrypt($recID);
        $cryptedType = Crypt::encrypt($type);

        // check the type and generate correct URL 
        switch ($type) {
            case 1:
            case 2:
                return URL::temporarySignedRoute('project.recommendation.get', now()->addMinutes(2880), ['type'=> $cryptedType, 'recID'=> $cryptedRecID]);
                break;
            case 3:
                return URL::temporarySignedRoute('project.recommendation.manager.get', now()->addMinutes(2880), ['type'=> $cryptedType, 'recID'=> $cryptedRecID]);
                break;
            case 4:
                return URL::temporarySignedRoute('project.approval.get', now()->addMinutes(2880), ['type'=> $cryptedType, 'recID'=> $cryptedRecID]);
                break;
            default:
            // abort the request if no matched case
                abort(404);
        }
    } 

    /**
     * Get 10 second delay time to queue email
     * 
     * @return Carbon/Date
     */
    public static function tenSecondDelayTime()
    {
        return now()->addSeconds(10);   
    }
}
