<div class="tab-pane fade show active" id="navs-pills-top-profile" role="tabpanel">
    <h4 class="card-header">Profile Details</h4>
        <!-- Account -->
    <hr class="my-3" />
    <form>
        <div class="row">
            @if($displayUserProfile)
            <div class="mb-3 col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" value="{{ $displayUserProfile->name }}" class="form-control" disabled>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Email</label>
                <input type="text" value="{{ $displayUserProfile->email }}" class="form-control" disabled>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Position</label>
                <input type="text" value="{{ $displayUserProfile->position }}" class="form-control" disabled>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">Department</label>
                <input type="text" value="{{ $displayUserProfile->department }}" class="form-control" disabled>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">User Type</label>
                <input type="text" value="{{ $displayUserProfile->role_as == 0 ? 'User' : '' }}" class="form-control" disabled>
            </div>
            @endif
        </div>
    </form>
</div>
