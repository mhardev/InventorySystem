@extends('layouts.admin')

@section('supplier_select', 'active')

@section('supplierinfo_select', 'active')

@section('title', 'Supplier List')

@section('content')
<div>
    <livewire:admin.supplier-info>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('SupplierInfoAdded', message => {
            toastr.success(message);
            $('#addSupplierInfoModal').modal('hide');
        });

        Livewire.on('SupplierInfoUpdated', message => {
            toastr.success(message);
            $('#updateSupplierInfoModal').modal('hide');
        });

        Livewire.on('SupplierInfoDeleted', message => {
            toastr.success(message);
            $('#deleteSupplierInfoModal').modal('hide');
        });

        Livewire.on('closeModal', function () {
            $('#showSupplierInfoModal').modal('hide');
        });
    </script>
@endsection
