@extends('layouts.form_layout')
@section('form_content')
<div class="container" >
    <div class="card">
        <div class="card-header">
            Project Approval Form
        </div>
        <div class="card-body">
            <form action="{{route('project.approval.post')}}" method="post" >
                @csrf
                <input type="hidden" name="recID" value="{{Crypt::encrypt($recID)}}">
                <div class="form-row">
                    <div class="form-group col-sm-4">Do you approve this project registration?1<span style="color:red"> *</span></div>
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="approvalYes">
                                <input class="form-check-input" type="radio" name="is_recommended" id="approvalYes" value="1">
                                Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            
                            <label class="form-check-label" for="approvalNo">
                                <input class="form-check-input" type="radio" name="is_recommended" id="approvalNo"
                                value="0">
                                No</label>
                        </div>
                    </div>
                    @if ($errors->has('approval'))
                    <div class="alert alert-danger" role="alert">
                            Approval Field is <strong class="" style="color:red">Required</strong>. Please select
                        your Approval.
                    </div>
                    @endif
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="projectDesc">Approval Comment</label><span style="color:red"> *</span>
                        <textarea class="form-control" id="approvalComment" name="comment" cols="30"
                            rows="10" value=""></textarea>
                        @if ($errors->has('recommendationComment'))
                        <div class="alert alert-danger" role="alert">
                                Approval Comment Field is <strong class="" style="color:red">Required</strong>.
                            Please enter your comment.
                        </div>
                        @endif
                        </span>
                        <span class="focus-border"></span>
                    </div>
                </div>
        
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection