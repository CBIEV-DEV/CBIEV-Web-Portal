<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PRDirectorApproval;
use Illuminate\Support\Facades\Crypt;

use App\Jobs\CreateNewProject;

class PRDirectorApprovalController extends Controller
{
    /**
     * 
     */
    public static function newApproval($statusID, $directorID)
    {
        $directorApproval = new PRDirectorApproval();
        $directorApproval-> approved_by = $directorID;
        $directorApproval-> is_recommended = null;
        $directorApproval-> comment = null;
        $directorApproval-> is_completed = 0;
        $directorApproval-> pr_status_tracking_id = $statusID;
        $directorApproval-> completed_at = null;
        $directorApproval-> save();

        return $directorApproval-> id;
    }

    /**
     * 
     */
    public function showApprovalForm($recID)
    {
        return view('form.recommendation.project_approval_form',['type' => 4, 'recID' => $recID]);
    }

    /**
     * 
     */
    public function saveApproval(Request $request)
    {
        $dec = Crypt::decrypt($request-> recID);
        $dec2 = Crypt::decrypt($dec);

        $app = PRDirectorApproval::find($dec2);
        $app-> is_recommended = $request-> is_recommended;
        $app-> comment = $request-> comment;
        if ($request-> approval == 1) {
            $app-> is_recommended = 1;
            $prID = $app-> prStatus-> projectRegistration-> id;
            CreateNewProject::dispatch($prID)->delay(now()->addSeconds(3));
        } else if ($request-> approval == 0){
            $app-> is_recommended = 0;
        }
        
        $app-> save();
    }
}