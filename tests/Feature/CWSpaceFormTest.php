<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CWSpaceFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $this->withoutExceptionHandling();

        $response->assertStatus(200);
        $response = $this->post(route('coworkingspace.registration.submit'),[
            "coworkingspaceprojectTitle" => "project title",
            "projectCategory" => 1,
            "coworkingspaceprojectstate" => "Problem StatementProblem StatementProblem StatementProblem Statement",
            "coworkingspaceCategory" => 1,
            "coworkingspacedurationstart" => "2020-10-02",
            "coworkingspacedurationend" => "2019-10-02",
                
            "coworkingspaceleadername" => "Tan Zi Xuan",
            "coworkingspaceIcNo" => "122222-22-4422",
            "coworkingspacephone" => "016-6207856",
            "coworkingspaceemail" => "tanzx-wa15@student.tarc.edu.my",
            "coworkingspaceleaderUCID" => "21WMR12297",
            "coworkingspaceleaderDepartmentCode" => 21,
            "coworkingspaceleaderProgramme" => "Bachelor of Information Systems (Honours) in Enterprise Information Systems",

            "participantIndex" => 2,
            "memberName" => [
                0 => "Tan",
                1 => "zi"
            ],
            "coworkingspacememberIC" => [
                0 => "122222-22-2231",
                1 => "122222-22-2222",
            ],
            "coworkingspacememberContact" => [
                0 => "016-6207856",
                1 => "016-6207855",
            ],
            "coworkingspacememberEmail" => [
                0 => "zxtan97a@hotmail.com",
                1 => "zxtan97ab@hotmail.com",
            ],
            "coworkingspacememberUCID" => [
                0 => "12WMR22222",
                1 => "12WMR22223",
            ],
            "coworkingspacememberDepartment" => [
                0 => "Faculty of Computing and Information Technology",
                1 => "Faculty of Computing and Information Technology",
            ],
            "coworkingspacememberDepartmentCode" => [
                0 => 21,
                1 => 21,
            ],
            "coworkingspacememberProgramme" => [
                0 => "Bachelor of Information Technology (Honours) in Internet Technology",
                1 => "Bachelor of Information Technology (Honours) in Internet Technology",
            ],

            "coworkingspacesupervisorname" => "Tan Zi Xuan",
            "coworkingspacestaffID" => "1234",
            "coworkingspacestafffaculty" => "FOCS",
            "coworkingspacesupervisorphone" => "012-2222222",
            "coworkingspacesupervisorEmail" => "tanzx-wa15@student.tarc.edu.my",
        ]);

        // $response->assertOk();
        $response->assertRedirect();
    }
}
