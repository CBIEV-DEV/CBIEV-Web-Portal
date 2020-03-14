<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\iSparkProject;
use App\ProjectRegistration;
class ISparkProjectController extends Controller
{
    public static function createNewProject($prID)
    {
        $projectRegistration = ProjectRegistration::find($prID);
        $newProject = new iSparkProject();

        $newProject-> project_title = $projectRegistration-> project_title;
        $newProject-> category_id = $projectRegistration-> category_id;
        $newProject-> team_leader = $projectRegistration-> team_leader;
        $newProject-> problem_statement = $projectRegistration-> problem_statement;
        $newProject-> product_solution = $projectRegistration-> product_solution;
        $newProject-> target_market = $projectRegistration-> target_market;

        $newProject-> save();
    }
}
