<div class="form-group">
    <label for="{{$type}}AddressLine1">Address Line 1<span style="color:red">*</span></label>
    <input type="text" name="{{$type}}AddressLine1" required="" placeholder="Insert registered address" required=""
        pattern="[A-Za-z0-9'\.\-\s\,]" id="{{$type}}AddressLine1" class="form-control">
    @error('AddressLine1')
    <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
</div>
<div class="form-group">
    <label for="{{$type}}AddressLine2">Address Line 2<span style="color:red">*</span></label>
    <input type="text" name="{{$type}}AddressLine2" placeholder="Insert registered address" required=""
        pattern="[A-Za-z0-9'\.\-\s\,]" id="{{$type}}AddressLine2" class="form-control">
    @error('AddressLine2')
    <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
    @enderror
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="{{$type}}AddressCity">City<span style="color:red">*</span></label>
        <input type="text" id="{{$type}}AddressCity" required="" pattern="^([A-Za-z][\s\w.,-]+[A-Za-z])(?=\.json|$)"
            title="example:Setapak, Sungai Siput, etc...." placeholder="Example: Setapak, Sungai Siput, etc...."
            name="{{$type}}AddressCity" class="form-control">
        @error('AddressCity')
        <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        @error('AddressState')
        <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
        <label for="{{$type}}AddressState">State<span style="color:red">*</span></label>
        <select name="{{$type}}AddressState" id="{{$type}}AddressState" class="form-control">
            <option></option>
            <option>Johor</option>
            <option>Kedah</option>
            <option>Kelantan</option>
            <option>Malacca</option>
            <option>Negeri Sembilam</option>
            <option>Pahang</option>
            <option>Penang</option>
            <option>Perak</option>
            <option>Perlis</option>
            <option>Sabah</option>
            <option>Sarawak</option>
            <option>Selangor</option>
            <option>Terengganu</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        @error('AddressZip')
        <div class="alert alert-danger" style="color:red"><strong>{{ $message }}</strong></div>
        @enderror
        <label for="{{$type}}AddressZip">Zip<span style="color:red">*</span></label>
        <input type="text" name="{{$type}}AddressZip" placeholder="Eg:53300, etc...." required="" pattern="[0-9]{5}"
            title="example:31100,etc..." id="{{$type}}AddressZip" class="form-control">
    </div>
</div>
