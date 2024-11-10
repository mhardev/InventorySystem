@extends('layouts.admin')

@section('requestreport_select', 'active')

@section('title', 'Request Report List')

@section('content')
<div>
    <livewire:admin.request-reports>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('itemRequestDetailShow', message => {
            toastr.error(message);
            $('#showItemRequestModal').modal('hide');
        });
    </script>
@endsection
