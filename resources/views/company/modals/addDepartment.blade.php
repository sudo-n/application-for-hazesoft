<div class="modal-header">
    <h5 class="modal-title">Add Department for {{$company->name}}</h5>
    <button type="button" class="md-close close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="addDepartmentForm">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="departmentName">Name</label>
                <input type="text" name="name" class="form-control" id="departmentName" placeholder="Department Name">
                <div class="errorMessage"></div>
            </div>
        </div>

    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="saveDepartment" data-cid="{{$company->id}}">Save changes</button>
    <button type="button" class="btn btn-secondary md-close" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
