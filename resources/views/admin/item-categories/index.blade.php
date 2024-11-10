@extends('layouts.admin')

@section('itemcategory_select', 'active')

@section('maincategory_select', 'active')

@section('title', 'Main Category List')

@section('content')
<div>
    <livewire:admin.item-category>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('itemCategoryAdded', message => {
            toastr.success(message);
            $('#addItemCategoryModal').modal('hide');
        });

        Livewire.on('itemCategoryUpdated', message => {
            toastr.success(message);
            $('#updateItemCategoryModal').modal('hide');
        });

        Livewire.on('itemCategoryDeleted', message => {
            toastr.success(message);
            $('#deleteItemCategoryModal').modal('hide');
        });
    </script>
@endsection
