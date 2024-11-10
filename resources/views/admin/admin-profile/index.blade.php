@extends('layouts.admin')

@section('adminprofile_select', 'active')

@section('title', 'Admin Profile')

@section('content')
<div>
    <livewire:admin.admin-profile>
</div>
@endsection

@section('scripts')
<script>
    Livewire.on('UpdateAdminProfile', message => {
        toastr.success(message);
    });
    Livewire.on('AdminProfileShow', message => {
        toastr.error(message);
    });
    Livewire.on('UserProfileShow', message => {
        toastr.error(message);
    });
</script>
@endsection
