@extends('layouts.admin')

@section('audittrail_select', 'active')

@section('title', 'Audit Trail List')

@section('content')
<div>
    <livewire:admin.audit-trails>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('closeModal', function () {
            $('#showActivityDetailsModal').modal('hide');
        });
    </script>
@endsection
