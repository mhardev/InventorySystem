@extends('layouts.client')

@section('userprofile_select', 'active')

@section('title', 'User Profile')

@section('content')
<div>
    <livewire:client.user-profile>
</div>
@endsection

@section('scripts')
<script>
    Livewire.on('UpdateUserProfile', message => {
        toastr.success(message);
    });
    Livewire.on('UserProfileShow', message => {
        toastr.error(message);
    });
</script>
@endsection
