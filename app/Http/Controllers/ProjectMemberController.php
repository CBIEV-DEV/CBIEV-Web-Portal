<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
class ProjectMemberController extends Controller
{
    public function getProgramme($faculty,$level){
        $selectedFaculty = '';
        $selectedLevel = '';

        // check what faculty
        switch($faculty){
            case 'R':
            case 'r':
                $selectedFaculty = 4;
            break;
            case 'P':
            case 'p':
                $selectedFaculty = 5;
            break;
            case 'B':
            case 'b':
                $selectedFaculty = 17;
            break;
            case 'L':
            case 'l':
                $selectedFaculty = 18;
            break;
            case 'V':
            case 'v':
                $selectedFaculty = 19;
            break;
            case 'K':
            case 'k':
                $selectedFaculty = 20;
            break;
            case 'M':
            case 'm':
                $selectedFaculty = 21;
            break;
            case 'G':
            case 'g':
                $selectedFaculty = 22;
            break;
            case 'J':
            case 'j':
                $selectedFaculty = 23;
            break;
        }
        // check what level
        switch ($level) {
            case 'P':
            case 'p':
                $selectedLevel = 1;
            break;
            case 'F':
            case 'f':
                $selectedLevel = 2;
            break;
            case 'D':
            case 'd':
                $selectedLevel = 3;
            break;
            case 'R':
            case 'r':
                $selectedLevel = 4;
            break;
            case 'M':
            case 'm':
                $selectedLevel = 5;
            break;
            case 'T':
            case 't':
                $selectedLevel = 6;
            break;
        }
        // get programmes from database
        // return programmes as array
        return Programme::where(array('center_faculty_id' => $selectedFaculty, 'level' => $selectedLevel))->pluck('programme_name');
        // return Programme::where(array('center_faculty_id' => $selectedFaculty, 'level' => $selectedLevel))->get();
    }

}
