<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectRegistrationFormTest extends TestCase
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
        $response = $this->post(route('project.registration.submit'),[
            "projectTitle" => "project title",
            "projectCategory" => "1",
            "projectstate" => "Problem StatementProblem StatementProblem StatementProblem Statement",
            "prodSol" => "Product/SolutionProduct/SolutionProduct/SolutionProduct/SolutionProduct/SolutionProduct/SolutionProduct/SolutionProduct/SolutionProduct/SolutionProduct/Solution ",
            "targetMark" => "Target MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarget MarkeTarg ▶",
            "leaderType" => "1",
            "leaderName" => "Tan Zi Xuan",
            "leaderIC" => "122222-22-4422",
            "leaderContact" => "016-6207856",
            "leaderEmail" => "zxtan97@hotmail.com",
            "leaderHasCompany" => "true",
            "leaderCompanyName" => "Tunku Abdul Rahman University College",
            "leaderCompanyRegNo" => "1033820M",
            "leaderCompanyEmail" => "tanzx-wa15@student.tarc.edu.my",
            "leaderPosition" => "Student",
            "leaderUCID" => "21WMR12297",
            "leaderDepartment" => "Faculty of Computing and Information Technology",
            "leaderProgramme" => "Bachelor of Information Systems (Honours) in Enterprise Information Systems",
            "participantIndex" => "1",
            "memberType" => [
            0 => "1"
          ],
          "memberName" => [
            0 => "Tan"
          ],
          "memberIC" => [
            0 => "122222-22-2231"
          ],
          "memberContact" => [
            0 => "016-6207856"
          ],
          "memberEmail" => [
            0 => "zxtan97a@hotmail.com"
          ],
          "memberHasCompany" => [
            0 => "true"
          ],
          "memberCompanyName" => [
            0 => "Tunku Abdul Rahman University College"
          ],
          "memberCompanyRegNo" => [
            0 => "1033820M"
          ],
          "memberCompanyEmail" => [
            0 => "tanzx-wa15@student.tarc.edu.my"
          ],
          "memberPosition" => [
            0 => "Student"
          ],
          "memberUCID" => [
            0 => "12WMR22222"
          ],
          "memberDepartment" => [
            0 => "Faculty of Computing and Information Technology"
          ],
          "memberProgramme" => [
            0 => "Bachelor of Information Technology (Honours) in Internet Technology"
          ],
          "supervisorIndex" => "1",
          "supType" => [
            0 => "2"
          ],
          "supervisorName" => [
            0 => "Tan Zi Xuan"
          ],
          "supervisorIC" => [
            0 => "122222-22-2243"
          ],
          "supervisorContact" => [
            0 => "012-2222222"
          ],
          "supervisorEmail" => [
            0 => "tanzx-wa15@student.tarc.edu.my"
          ],
          "supervisorHasCompany" => [
            0 => "true"
          ],
          "supervisorCompanyName" => [
            0 => "Tunku Abdul Rahman University College"
          ],
          "supervisorCompanyRegNo" => [
            0 => "1033820M"
          ],
          "supervisorCompanyEmail" => [
            0 => "zxtan97@hotmail.com"
          ],
          "supervisorPosition" => [
            0 => "Lecturer"
          ],
          "supervisorUCID" => [
            0 => "2132"
          ],
          "supervisorDepartmentCode" => [
            0 => "Center of Postgraduete Studies and Research"
          ],
        ]);

        // $response->assertOk();
        $response->assertRedirect();
    }
}
