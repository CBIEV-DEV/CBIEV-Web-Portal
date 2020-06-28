<div class=" text-center" style="margin-top:1rem;">
    <div class="m-3"><strong>---------------------------------------------------------------------------- Business Activity ---------------------------------------------------------------------------</strong></div>
</div>
<div class="form-group row">
    <label for="companyBusinessClassification" class="col-sm-3 col-form-label">Business Classification<span style="color:red">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="companyBusinessClassification" placeholder="Example: Agricultural business, NGOs, Research business, Industrial business, IT firms, Product based companies, etc...." id="companyBusinessClassification" required="" class="form-control">
        @error('companyBusinessClassification')
    <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
    </div>
</div>
<div class="form-group row">
    <label for="companyBusinessDesc" class="col-sm-3 col-form-label">Brief Description of Business<span style="color:red">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="companyBusinessDesc" placeholder="State the description of Business" id="companyBusinessDesc" required="" class="form-control">
        @error('companyBusinessDesc')
        <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
</div>
<div class="form-row mb-1">
    <label for="companyAreaOfInterest">State  the type of activities your company is interested to invest/explore<span style="color:red"> *</span></label>
    <textarea class="form-control" id="companyAreaOfInterest" name="companyAreaOfInterest" placeholder="State the type of activities your company is interested to invest/explore" required="" cols="30" rows="5" value="">{{ old('companyAreaOfInterest')}}</textarea>
    @error('companyAreaOfInterest')
    <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
    <span class="focus-border"></span>
</div>
<div class="form-group row">
    <label for="mentorCategory" class="col-sm-6 col-form-label">
        Would you like to be a member of the panel of judges in the iSpark Ideation or/and pitching session?<br>
        If <strong>YES</strong>, you will need to attend at least one session every month.<span style="color:red">*</span>
    </label>
    <div class="col-sm-6">
        <div class="form-check form-check-inline">
            @error('companyAttendSession')
    <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
            <input class="form-check-input" required="" type="radio" name="companyAttendSession" id="companyAttendSessionYes" value="1">
            <label class="form-check-label" for="companyAttendSessionYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" required="" type="radio" name="companyAttendSession" id="companyAttendSessionNo" value="0">
            <label class="form-check-label" for="companyAttendSessionNo">No</label>
        </div>
    </div>
</div>