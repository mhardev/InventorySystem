@extends('layouts.admin')

@section('useracc_select', 'active')

@section('title', 'Users List')

@section('content')
<div>
    <livewire:admin.user-account>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('userAccountAdded', message => {
            toastr.success(message);
            $('#addUserAccModal').modal('hide');
        });

        Livewire.on('userInfoUpdated', message => {
            toastr.success(message);
            $('#updateUserInfoModal').modal('hide');
        });

        Livewire.on('userPasswordUpdated', message => {
            toastr.success(message);
            $('#updateUserPassModal').modal('hide');
        });

        Livewire.on('userInfoShow', message => {
            toastr.error(message);
            $('#showUserInfoModal').modal('hide');
        });

        Livewire.on('userAccountDeleted', message => {
            toastr.success(message);
            $('#deleteUserAccModal').modal('hide');
        });
    </script>
@endsection
