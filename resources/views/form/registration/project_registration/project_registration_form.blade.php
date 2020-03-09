@extends('layouts.form_layout')

@section('form_content')

<div class="container">
    <div class="">
        <div>
            <div class="text-center">
                <h4 class="display-4 form-title">iSpark Project Registration</h4>
                <h4 class="display-4 form-title">----------------------------------------------</h4>
            </div>
        </div>
        <form method="POST" action="{{route('project.registration.submit')}}" name="regisForm" id="regisForm">
            {{ csrf_field() }}
            <div class=" text-center" style="margin-top:1rem;">
                <div><strong>Project Information</strong></div>
            </div>  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="projectTitle">Project Title</label><span style="color:red"> *</span>
                    <input type="text" id="projectTitle" name="projectTitle" placeholder="insert project Title" required="" class="form-control" value="{{ old('projectTitle')}}"
                        autofocus style="text-transform:uppercase">
                    @if ($errors->has('projectTitle'))
                    <div class=" " role="">
                        Project Title is <strong class="" style="color:red">Required</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="projectCategory">
                        Project Category
                    </label><span style="color:red"> *</span>
                    <select name="projectCategory" required="" id="projectCategory" class="form-control">
                        <option value="1">TAR UC Postgraduate Students Registered with CPSR</option>
                        <option value="2">TAR UC Academic Staff Supervising Postgraduate Students’ Research
                            Projects</option>
                        <option value="3">TAR UC Academic Staff and Students Engaged in Academia-Industry
                            Project</option>
                        <option value="4">TAR UC Students engaged in the projects with potential for
                            commercialization</option>
                        <option value="5">TAR UC Students Registered for iSpark or Other Approved Programs</option>
                        <option value="6">TAR UC Approved Mentors/Advisors for iSpark or Other Approved
                            Programs</option>
                        <option value="7">TAR UC / Alumni / Public Registered as Incubatee</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                    <label for="projectstate">Problem Statement</label><span style="color:red"> *</span>
                    <textarea class="form-control" id="projectstate" name="projectstate" placeholder="Insert problem Statement" required="" cols="30" rows="5" value="">{{ old('projectstate')}}</textarea>
                    <span class="focus-border"></span>
            </div>
            <div class="form-row">
                    <label for="prodSol">Product/Solution</label><span style="color:red"> *</span>
                    <textarea class="form-control" id="prodSol" name="prodSol" placeholder="Insert products/Solution" required="" cols="30" rows="5" value="">{{ old('prodSol')}}</textarea>
                    <span class="focus-border"></span>
            </div>
            <div class="form-row">
                    <label for="targetMark">Target Market</label><span style="color:red"> *</span>
                    <textarea class="form-control" id="targetMark" name="targetMark" placeholder="Insert target Market" required="" cols="30" rows="5" value="">{{ old('targetMark')}}</textarea>
                    <span class="focus-border"></span>
            </div>
            <div class=" text-center" style="margin-top:1rem;">
                <div><strong>----------------------------------------------------------------------------- Team Leader Information ----------------------------------------------------------------------------</strong> </div>
            </div>
            <team-leader></team-leader>
            <div class=" text-center"  style="margin-top:1rem;">
                <strong>------------------------------------------------------------------------------- Member Information -------------------------------------------------------------------------------</strong>
            </div>
            <member></member>
            <div class=" text-center" style="margin-top:1rem;">
                <strong>------------------------------------------------------------------------------ Supervisor Information --------------------------------------------------------------------------------</strong>
            </div>
            <supervisor></supervisor> 
            <div class="form-row">
                <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-success" >Submit</button>
                </div>
                <div class="form-group col-md-8 offset-md-1">
                    <button type="reset" class="btn btn-light" style="text-decoration:underline; width:5rem">Reset</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
