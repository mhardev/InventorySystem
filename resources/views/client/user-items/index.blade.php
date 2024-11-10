@extends('layouts.client')

@section('useritem_select', 'active')

@section('title', 'User Item List')

@section('content')
<div>
    <livewire:client.user-items>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('itemDetailShow', message => {
            toastr.error(message);
            $('#showItemModal').modal('hide');
        });

        Livewire.on('SurrenderItemRequest', message => {
            toastr.success(message);
            $('#surrenderItemModal').modal('hide');
        });
    </script>
@endsection
