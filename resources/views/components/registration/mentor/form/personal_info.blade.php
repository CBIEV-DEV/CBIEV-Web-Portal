<div class=" text-center" style="margin-top:1rem;">
    <div class="m-3"><strong>-------------------------------------------------------------------------- Personal
            Information -------------------------------------------------------------------------</strong></div>
</div>
<div class="form-group row">
    <label for="mentorName" class="col-sm-2 col-form-label">Name<span style="color:red">*</span></label>
    <div class="col-sm-10">
        <input type="text" name="mentorName" required="" placeholder="Insert name" id="mentorName" class="form-control">
        @error('name')
        <div style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="mentorICPass" class="col-sm-2 col-form-label">IC No/Passport No<span style="color:red">*</span></label>
    <div class="col-sm-10">
        <input type="text" name="mentorICPass" placeholder="Example:xxxxxx-xx-xxxx, etc..." required=""
            pattern="[0-9]{6}[-][0-9]{2}[-][0-9]{4}" title="Example:xxxxxx-xx-xxxx" id="mentorICPass"
            class="form-control">
        @error('mentorICPass')
        <div style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="mentorContact" class="col-sm-2 col-form-label">Contact<span style="color:red">*</span></label>
    <div class="col-sm-10">
        <input type="text" name="mentorContact" placeholder="Example:012-xxxxxxx, etc..." required=""
            pattern="0[0-9]{2}[-][0-9]{7,}" title="Example:012-xxxxxxx, etc...." id="mentorContact"
            class="form-control">
        @error('mentorContact')
        <div style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="mentorEmail" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
    <div class="col-sm-10">
        <input type="text" name="mentorEmail" placeholder="Example:abc123@gmail.com, etc..." required=""
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$"
            title="Example:abc123@gmail.com" id="mentorEmail" class="form-control">
        @error('mentorEmail')
        <div style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="mentorFile" class="col-sm-2 col-form-label">File Upload<span style="color:red">*</span></label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="mentorFile" id="mentorFile">
    </div>
</div>
