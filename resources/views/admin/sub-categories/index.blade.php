@extends('layouts.admin')

@section('itemcategory_select', 'active')

@section('subcategory_select', 'active')

@section('title', 'Sub Category List')

@section('content')
<div>
    <livewire:admin.item-subcategory>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('subCategoryAdded', message => {
            toastr.success(message);
            $('#addSubCategoryModal').modal('hide');
        });

        Livewire.on('subCategoryUpdated', message => {
            toastr.success(message);
            $('#updateSubCategoryModal').modal('hide');
        });

        Livewire.on('subCategoryDeleted', message => {
            toastr.success(message);
            $('#deleteSubCategoryModal').modal('hide');
        });
    </script>
@endsection
