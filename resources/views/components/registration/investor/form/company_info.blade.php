<div class=" text-center" style="margin-top:1rem;">
    <div class="m-3"><strong> Company Information </strong></div>
</div>
<div class="form-group row">
    <label for="companyRegisteredName" class="col-sm-3 col-form-label">Registered Company Name<span
            style="color:red">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="companyRegisteredName" title="Please insert company name"
            placeholder="Insert company name" required="" id="companyRegisteredName" class="form-control">
        @error('companyRegisteredName')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="companyBusinessRegNo" class="col-sm-3 col-form-label">Company Registration No<span
            style="color:red">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="companyBusinessRegNo" pattern="[a-zA-Z0-9]+"
            titl="Please insert company registration number" placeholder="Insert company resgistration number"
            required="" id="companyBusinessRegNo" class="form-control">
            @error('companyBusinessRegNo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="companyRegAddress" class="col-sm-3 col-form-label">Registered Address<span
            style="color:red">*</span></label>
    <div class="col-sm-9">
        @component('components.address.address', ['type' => 'register'])

        @endcomponent
    </div>
</div>
<div class="form-group row">
    <label for="sameAddress" class="col-sm-3 col-form-label">Business Address<span style="color:red">*</span></label>
    <div class="col-sm-9">

        @component('components.address.address', ['type' => 'business'])

        @endcomponent
    </div>
</div>
<div class="form-group row">
    <label for="companyPaidUpCap" class="col-sm-3 col-form-label">Paid Up Capital<span
            style="color:red">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="companyPaidUpCap" placeholder="Insert paid up capital" required=""
            id="companyPaidUpCap" class="form-control">
            @error('companyPaidUpCap')
            <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
    </div>
</div>
<div class="form-group row">
    <label for="companyWebsite" class="col-sm-3 col-form-label">Company Website(If any)</label>
    <div class="col-sm-9">
        <input type="text" name="companyWebsite" placeholder="Insert company website" required="" id="companyWebsite"
            class="form-control">
    </div>
</div>
