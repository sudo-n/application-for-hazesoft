<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Name</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-pill btn-success" id="addEmployee"><i class="fa fa-plus"></i> Employee</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-deck" id="employeeCards">
        {{-- @forelse ($company->employees as $employee)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$employee->name}}</h5>
                <p class="card-text">
                    <strong>Emp#: {{$employee->employee_number}}</strong><br>
                    <strong>Designation: </strong> &nbsp; <span class="badge badge-sm badge-success">{{$employee->designation}}</span><br>
                    <strong>Department(s)</strong>:
                    @foreach ($employee->departments as $department)
                        <span>{{$department->name}}</span>
                    @endforeach
                </p>
            </div>
            <div class="card-footer">
                <span>{{$employee->email}}</span> <br>
                <span>{{$employee->contact}}</span>
            </div>
        </div>
        @empty
        <span>No employees added.</span>
        @endforelse --}}
        @include('company.partials._emp_list', ['employees' => $company->employees])
    </div>
</div>
<script>
    $(document).off('click', '#addEmployee').on('click', '#addEmployee', function(e) {
        e.preventDefault();
        modalLauncher({
            url: "/company/{{$company->id}}/employee/add"
        });
    })
</script>
