@forelse ($departments as $department)
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
@endforelse
