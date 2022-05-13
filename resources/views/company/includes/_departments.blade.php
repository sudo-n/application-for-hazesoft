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
                    <button class="btn btn-pill btn-success" id="addDepartment"><i class="fa fa-plus"></i> Department</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-deck" id="departmentCards">

        {{-- @forelse ($company->departments as $department)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$department->name}}</h5>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{\Carbon\Carbon::parse($department->created_at)->diffForHumans()}}</small>
            </div>
        </div>
        @empty
        <span>No Departments added.</span>
        @endforelse --}}
        @include('company.partials._dept_list', ['departments' => $company->departments])
    </div>

</div>

<script>
    $(document).off('click', '#addDepartment').on('click', '#addDepartment', function(e) {
        e.preventDefault();
        modalLauncher({
            url: "/company/{{$company->id}}/department/add"
        });
    })
</script>
