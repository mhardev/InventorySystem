@extends('layouts.admin')

@section('itembrand_select', 'active')

@section('title', 'Brand List')

@section('content')
<div>
    <livewire:admin.item-brands>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('itemBrandAdded', message => {
            toastr.success(message);
            $('#addItemBrandModal').modal('hide');
        });

        Livewire.on('itemBrandUpdated', message => {
            toastr.success(message);
            $('#updateItemBrandModal').modal('hide');
        });

        Livewire.on('itemBrandDeleted', message => {
            toastr.success(message);
            $('#deleteItemBrandModal').modal('hide');
        });
    </script>
@endsection
