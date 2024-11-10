@extends('layouts.admin')

@section('surrenderitem_select', 'active')

@section('title', 'Surrendered Item List')

@section('content')
<div>
    <livewire:admin.surrender-items>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('SurrenderedRequestApproved', message => {
            toastr.success(message);
            $('#surrenderItemRequestModal').modal('hide');
        });

        Livewire.on('SurrenderedRequestError', message => {
            toastr.error(message);
            $('#surrenderItemRequestModal').modal('hide');
        });

        Livewire.on('itemDetailShow', message => {
            toastr.error(message);
            $('#showItemModal').modal('hide');
        });
    </script>
@endsection
