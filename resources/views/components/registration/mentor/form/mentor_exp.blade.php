<div class=" text-center" style="margin-top:1rem;">
    <div class="m-3"><strong>------------------------------------------------------------------------- Mentoring
            Experience -------------------------------------------------------------------------</strong></div>
</div>
<div class="form-group row">
    <label for="mentorCategory" class="col-sm-6 col-form-label">Do you have experience in mentoring entreprenial related
        project?<span style="color:red">*</span></label>

    <div class="col-sm-8">

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="mentorHasExp" id="mentorHasExpYes" value="1"
                @click="hasExp">

            <label class="form-check-label" for="mentorHasExpYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="mentorHasExp" id="mentorHasExpNo" value="0"
                @click="hasNoExp">
            <label class="form-check-label" for="mentorHasExpNo">No</label>
            @error('mentorHasExp')
            <div style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
</div>

<div class="form-row m-2">
    <label for="mentorExpText">
        <div v-if="mentorHasExpOption">If <strong>yes</strong>, please state the type of <span
                title="technical/soft skills"><u>mentoring capabilities or skills (?)</u></span> you would like to
            provide?
            <span style="color:red"> *</span>
        </div>
        <br>

        <div v-if="mentorNoExpOption">If <strong>no</strong>,
            please state your capabilities/skills that would lend yourself to mentoring.<span style="color:red">*</span>
        </div>
    </label>

    <textarea class="form-control" id="mentorExpText" name="mentorExpText" cols="30" rows="5"
        value="">{{ old('mentorExpText')}}</textarea>
    @error('mentorExpText')
    <div style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
    <span class="focus-border"></span>

</div>
<div class="form-row m-2">
    <label title="starting up business etc." for="mentorExpEntrepreneuship">What is your experience, if any,
        with<u>entrepreneuship?</u></label><span style="color:red"> *</span>
    <textarea class="form-control" id="mentorExpEntrepreneuship" name="mentorExpEntrepreneuship" cols="30" rows="5"
        value="">{{ old('mentorExpEntrepreneuship')}}</textarea>
    @error('mentorExpEntrepreneuship')
    <div style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
    <span class="focus-border"></span>
</div>
<div class="form-group row">
    <label for="mentorCategory" class="col-sm-7 col-form-label">Are you willing to commit 1 - 2 hours every month for
        mentoring purpose?</label>
    <div class="col-sm-5"><span style="color:red"> *</span>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="mentoring" id="mentoringYes" value="1">
            <label class="form-check-label" for="mentoringYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="mentoring" id="mentoringNo" value="0">
            @error('mentoring')
            <div style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
            <label class="form-check-label" for="mentoringNo">No</label>
        </div>
    </div>
</div>
<div class="form-row m-2">
    <label for="howHearProgram">How did you hear of our program?</label><span style="color:red"> *</span>
    <textarea class="form-control" id="howHearProgram" name="howHearProgram" cols="30" rows="5"
        value="">{{ old('howHearProgram')}}</textarea>
    @error('howHearProgram')
    <div style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
    <span class="focus-border"></span>
</div>

{{-- <div class="form-group row">
    <label for="mentor" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <textarea name="mentorExpText" id="mentorExpText" cols="30" rows="10"></textarea>
    </div>
</div> --}}
