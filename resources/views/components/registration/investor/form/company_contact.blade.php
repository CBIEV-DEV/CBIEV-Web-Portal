<div class=" text-center" style="margin-top:1rem;">
    <div class="m-3"><strong>--------------------------------------------------------------------- Company Contact Information ---------------------------------------------------------------------</strong></div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="companyTel" class="col-form-label">Tel No(Home)<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="companyTel" placeholder="Example: 05-598 xxxx, 03-2xxx xxxx, etc...." required="" pattern="0[0-9]{1,2}-[0-9]{7,}" title="Example: 05-598 xxxx, 03-2xxx xxxx, etc...." id="companyTel" class="form-control">
            @error('companyTel')
            <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="companyFax" class=" col-form-label">Fax No(Office)<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="companyFax" placeholder="Example: 05-598 xxxx, 03-2xxx xxxx, etc...." required="" pattern="0[0-9]{1,2}-[0-9]{7,}" title="Example: 05-598 xxxx, 03-2xxx xxxx, etc...." id="companyFax" class="form-control">
            @error('companyFax')
            <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="companyHP" class="col-sm-2 col-form-label">HP No<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="companyHP" placeholder="Example: 012-xxxxxxx, etc...." required="" pattern="0[0-9]{2}[-][0-9]{7,}" title="Example:012-xxxxxxx,etc...." id="companyHP" class="form-control">
            @error('companyHP')
            <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="companyEmail" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
        <div class="">
            <input type="text" name="companyEmail" placeholder="Example:abc123@gmail.com, etc..." title="Example:abc123@gmail.com, etc..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$" required="" id="companyEmail" class="form-control">
            @error('companyEmail')
            <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
</div>