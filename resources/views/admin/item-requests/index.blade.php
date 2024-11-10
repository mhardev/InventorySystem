@extends('layouts.admin')

@section('itemrequest_select', 'active')

@section('title', 'Item Request List')

@section('content')
<div>
    <livewire:admin.item-requests>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('ItemRequestApproved', message => {
            toastr.success(message);
            $('#approvedItemRequestModal').modal('hide');
        });

        Livewire.on('ItemRequestError', message => {
            toastr.error(message);
            $('#approvedItemRequestModal').modal('hide');
        });

        Livewire.on('ItemRequestCancelled', message => {
            toastr.success(message);
            $('#cancelledItemRequestModal').modal('hide');
        });
        Livewire.on('itemRequestDetailShow', message => {
            toastr.error(message);
            $('#showItemRequestModal').modal('hide');
        });
    </script>
@endsection
