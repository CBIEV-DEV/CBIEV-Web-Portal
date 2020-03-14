@extends('layouts.form_layout')

@section('form_content')

<div class="container">
    <div class="">
        <div>
            <div class="text-center">
                <h4 class="display-4 form-title">Co-Working Space Registration Form</h4>
                <h4 class="display-4 form-title">----------------------------------------------</h4>
            </div>
        </div>
        <form method="POST" action="{{route('coworkingspace.registration.submit')}}" name="regisForm" id="regisForm">
            {{ csrf_field() }}
            <div class=" text-center" style="margin-top:1rem;">
                <div><strong> Category </strong></div>
            </div>  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="coworkingspaceCategory">
                        Category
                    </label><span style="color:red"> *</span>
                    <select name="coworkingspaceCategory" required="" id="coworkingspaceCategory" class="form-control">
                        <option value="1">R&D outcomes, Final Year Projects(FYPs), Capstone Projects(Undergraduate/Postgraduate), Industrial Research Collaborations, Developmental types of work</option>
                        <option value="2">Project outcomes of iSpark, Extra-Curriculum Projects, Non-Academic One-Off Projects</option>
                    </select>
                </div>
            </div>
            
            <div class=" text-center" style="margin-top:1rem;">
                <div><strong>----------------------------------------------------------------------------- Team Leader Information ----------------------------------------------------------------------------</strong> </div>
                
            </div>

            
            <div class="form-row ">
            <div class="form-group col-md-6">
        <label for="coworkingspaceleadername" class="col-form-label">Leader Name<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspaceleadername" placeholder="Insert your name" required="" title="Please insert your name" id="coworkingspaceleadername" class="form-control">
        </div>
        </div>
        <div class="form-group col-md-6">
        <label for="coworkingspaceIcNo" class="col-form-label">IC No.<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspaceIcNo" placeholder="Example:xxxxxx-xx-xxxx, etc..." required="" pattern="[0-9]{6}[-][0-9]{2}[-][0-9]{4}"  title="Example:xxxxxx-xx-xxxx" id="coworkingspaceIcNo" class="form-control">
        </div>
        </div>

    <div class="form-group col-md-6">
        <label for="coworkingspacephone" class="col-form-label">Contact No(HP)<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspacephone" placeholder="Example: 012-xxxxxxx, etc...." required="" pattern="0[0-9]{2}[-][0-9]{7,}" title="Example: 012-xxxxxxx, etc...." id="coworkingspacephone" class="form-control">
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="coworkingspaceemail" class="col-form-label">E-mail<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspaceemail" placeholder="Example:abc123@gmail.com, etc..." required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$" title="Example:abc123@gmail.com, etc..." id="coworkingspaceemail" class="form-control">
        </div>
    </div>
    </div>
    <coworkingspace-teamleader>
            </coworkingspace-teamleader>
    
 <div class="text-center"><strong>----------------------------------------------------------------------------- Team Member Information ---------------------------------------------------------------------------</strong></div>
            <coworkingspace-member>
           
            </coworkingspace-member>

            
            
            <div><strong>-------------------------------------------------------------------------------- Supervisor/Mentor -------------------------------------------------------------------------------- </strong></div>
            <div class="form-row ">
            <div class="form-group col-md-6">
        <label for="coworkingspacesupervisorname" class="col-form-label">Supervisor/Mentor Name<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspacesupervisorname" placeholder="Insert your name" required="" title="Please insert your name" id="coworkingspacesupervisorname" class="form-control">
        </div>
        </div>
        <div class="form-group col-md-6">
        <label for="coworkingspacestaffID" class="col-form-label">Staff ID<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspacestaffID" placeholder="Insert your ID" required="" pattern="[0-9]{4}" title="Please insert your Student ID" id="coworkingspacestaffID" class="form-control">
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="coworkingspacestafffaculty" class="col-form-label">Faculty<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspacestafffaculty" placeholder="Example: FOCS, FOBE, FOAS, etc...." required="" title="Please insert your faculty" id="coworkingspacestafffaculty" class="form-control">
        </div>
    </div>
    
    <div class="form-group col-md-6">
        <label for="coworkingspacesupervisorphone" class="col-form-label">Contact No(HP)<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspacesupervisorphone" placeholder="Example: 012-xxxxxxx, etc...." required="" pattern="0[0-9]{2}[-][0-9]{7,}" title="Example: 012-xxxxxxx, etc...." id="coworkingspacesupervisorphone" class="form-control">
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="coworkingspacesupervisorEmail" class="col-form-label">E-mail<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspacesupervisorEmail" placeholder="Example:abc123@gmail.com, etc..." required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$" title="Example: 05-598 xxxx, 03-2xxx xxxx, etc...." id="coworkingspacesupervisorEmail" class="form-control">
        </div>
    </div>
    </div>

            <div class=" text-center" style="margin-top:1rem;">
                <div><strong>-------------------------------------------------------------------------------- Project Information --------------------------------------------------------------------------------</strong></div>
            </div>  
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="coworkingspaceprojectTitle">Project Title</label><span style="color:red"> *</span>
                    <input type="text" id="coworkingspaceprojectTitle" name="coworkingspaceprojectTitle" placeholder="insert project Title" required="" class="form-control" value="{{ old('coworkingspaceprojectTitle')}}"
                        autofocus style="text-transform:uppercase">
                    @if ($errors->has('coworkingspaceprojectTitle'))
                    <div class=" " role="">
                        Project Title is <strong class="" style="color:red">Required</strong>
                    </div>
                    @endif
                    <br></br>
                    <div class="form-row col-md-20">
                    <label for="coworkingspaceprojectstate">Desciption of Project</label><span style="color:red"> *</span>
                    <textarea class="form-control" id="coworkingspaceprojectstate" name="coworkingspaceprojectstate" placeholder="Insert description of project" required="" cols="30" rows="5" value="{{ old('coworkingspaceprojectstate')}}"></textarea>
                    <span class="focus-border"></span>
            </div>
            <br></br>

                <div class="form-row col-md-6">
                    <label for="coworkingspaceduration">Duration of Project<span style="color:red"> *</span></label>
                    <div><strong>From</strong>
                   <div><input type="date" required="" id="coworkingspacedurationstart" name="coworkingspacedurationstart" value="" min="1900-01-01" max="2500-12-31"></div>
                   <div><strong>To</strong></div>
                   <input type="date" id="coworkingspacedurationend" name="coworkingspacedurationend" required="" value="" min="1900-01-01" max="2500-12-31">
                    <span class="focus-border"></span>
                    </div>
                </div>
        </div>
                

    <div class="form-group row">
    <div class="col-sm-12">
    <div class=" text-center" style="margin-top:1rem;">
                <div><strong>------------------------------------------------------------------------------------ Declaration ------------------------------------------------------------------------------------</strong> </div>
            </div>
            <div class="form-group col-md-5">
        <label for="coworkingspaceLeaderIcNo" class="col-form-label">Leader IC No.<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="coworkingspaceLeaderIcNo" placeholder="Example:xxxxxx-xx-xxxx, etc..." required="" pattern="[0-9]{6}[-][0-9]{2}[-][0-9]{4}"  title="Example:xxxxxx-xx-xxxx" id="coworkingspaceLeaderIcNo" class="form-control">
        </div>
        <br/>
        

        <div class="form-check">
            <input class="form-check-input" required="" type="checkbox" required="" title="Please agree to proceed"  name="coworkingspacedeclare" id="coworkingspacedeclare">
            <label class="form-check-label" for="coworkingspacedeclare">
                <span style="color: red">* </span>I confirm that the above information is true.
            </label>
        </div>
        </div>
        
        <br></br>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-success" >Submit</button>
                </div>
                <div class="form-group col-md-8 offset-md-1">
                    <button type="reset" redirect="http://127.0.0.1:8000/" class="btn btn-light" style="text-decoration:underline; width:5rem">Reset</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
