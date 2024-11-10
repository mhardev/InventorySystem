<div>
    <div>
        <h3 class="mb-4">Account Profile</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
            <li class="breadcrumb-item">
                <a href="{{url('admin/dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Account Profile</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">
                    @include('livewire.admin.includes.navs.profile-nav-item')
                    <div class="tab-content">
                        @include('livewire.admin.includes.tabs.profile-tab')
                        @include('livewire.admin.includes.tabs.notif-tab')
                        <div class="tab-pane fade" id="navs-pills-top-settings" role="tabpanel">
                            <h4 class="card-header">Update Profile Details</h4>
                            <!-- Account -->
                            <hr class="my-3" />
                            <div class="nav-align-top mb-4">
                                @include('livewire.admin.includes.navs.admin-settings.settings-nav-item')
                                <div class="tab-content">
                                    @include('livewire.admin.includes.tabs.admin-settings.admin-info-tab')
                                    @include('livewire.admin.includes.tabs.admin-settings.admin-password-tab')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
