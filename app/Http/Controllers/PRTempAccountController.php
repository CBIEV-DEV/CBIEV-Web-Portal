<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProjectRegistration;
use Illuminate\Support\Facades\Crypt;
use App\Jobs\SendUpdatedPRNotification;

class PRTempAccountController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:project-registration');
    }

    /**
     * 
     */
    public function home()
    {
        if(!(Auth::user()-> is_activated == 1)){
            abort(401);
        }

        return view('project_registration.home',['projectRegis' => ProjectRegistration::find(Auth::user()-> project_registration_id)]);
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        // validate
        // Auth::logout();
        try {
            $decryptedPRID = Crypt::decrypt($request-> prID);
        } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(401);
        }
        
        $oldPR = ProjectRegistration::find($decryptedPRID);
        $newPR = $oldPR;
        $newPR -> problem_statement = $request-> newProblem;
        $newPR -> product_solution = $request-> newProdSol;
        $newPR -> target_market = $request-> newTarget;
        $newPR -> save();

        ProjectRegistrationChangeLogController::newLog($decryptedPRID, $newPR, $oldPR);
        
        if (Auth::guard('project-registration')->check()) {
            Auth::user()-> deactivate();
        }
        
        SendUpdatedPRNotification::dispatch($decryptedPRID)->delay(now()-> addSeconds(100));
        return redirect('pr.temp.update.complete');

    }

    /**
     * 
     */
    public function updateComplete()
    {

        return view('project_registration.pr_update_complete');

    }
}