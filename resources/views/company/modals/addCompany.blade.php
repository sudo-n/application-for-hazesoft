<div class="modal-header">
    <h5 class="modal-title">Add Company</h5>
    <button type="button" class="md-close close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="addCompanyForm">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="companyName">Name</label>
                <input type="text" name="name" class="form-control" id="companyName" placeholder="Company Name">
                <div class="errorMessage"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPhone">Phone No.</label>
                <input type="text" class="form-control" name="phone_no" id="inputPhone" placeholder="Phone Number">
                <div class="errorMessage"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" name="address1" class="form-control" id="inputAddress" placeholder="1234 Main St">
            <div class="errorMessage"></div>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            <div class="errorMessage"></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" name="city" class="form-control" id="inputCity">
                <div class="errorMessage"></div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" name="state" id="inputState" class="form-control">
                <div class="errorMessage"></div>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" name="zip" id="inputZip">
                <div class="errorMessage"></div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="saveCompany">Save changes</button>
    <button type="button" class="btn btn-secondary md-close" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
