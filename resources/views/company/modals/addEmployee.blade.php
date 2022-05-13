<div class="modal-header">
    <h5 class="modal-title">Add Employee</h5>
    <button type="button" class="md-close close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="addEmployeeForm">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="employeeName">Name</label>
                <input type="text" name="name" class="form-control" id="employeeName" placeholder="Employee Name">
                <div class="errorMessage"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                <div class="errorMessage"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDesignation">Designation</label>
                <input type="text" class="form-control" name="designation" id="inputDesignation" placeholder="Designation">
                <div class="errorMessage"></div>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDepartment">Department</label>
                <select name="department_id" class="form-control" id="inputDepartment">
                    <option value="">select department</option>
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                <div class="errorMessage"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPhone">Phone No.</label>
                <input type="text" class="form-control" name="contact" id="inputPhone" placeholder="Phone Number">
                <div class="errorMessage"></div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="saveEmployee" data-cid="{{$company->id}}">Save changes</button>
    <button type="button" class="btn btn-secondary md-close" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
