<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoWorkingSpaceApplication;
class CBIEVStaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:cbiev-staff');
    }
    
    /**
     * Show staff home dashboard
     * 
     * @return View view
     */
    public function showStaffHome(){
        return view('CBIEVStaff.home');
    }

    public function showCwSpaceList()
    {
        return view('CBIEVStaff.registration.cwspace.cw_space_list', ['cwSpace' => CoWorkingSpaceApplication::all()]);
    }

    public function showCwSPaceApplication($id)
    {
        // return dd(CoWorkingSpaceApplication::find($id)->projectMember()->get());
        return view('CBIEVStaff.registration.cwspace.cw_space_detail',['cwspce' => CoWorkingSpaceApplication::find($id)]);
    }
}
