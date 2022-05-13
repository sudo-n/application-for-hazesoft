@forelse ($employees as $employee)
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$employee->name}}</h5>
        <p class="card-text">
            <strong>Emp#: {{$employee->employee_number}}</strong><br>
            <strong>Designation: </strong> &nbsp; <span class="badge badge-sm badge-success">{{$employee->designation}}</span><br>
            <strong>Department(s)</strong>: <span>{{$employee->department->name}}</span>
        </p>
    </div>
    <div class="card-footer">
        <span>{{$employee->email}}</span> <br>
        <span>{{$employee->contact}}</span>
    </div>
</div>
@empty
<span>No employees added.</span>
@endforelse
