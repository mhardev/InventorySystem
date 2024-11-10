@extends('layouts.client')

@section('itemproduct_select', 'active')

@section('title', 'Item Product List')

@section('content')
<div>
    <livewire:client.item-products>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('ItemProductAdded', message => {
            toastr.success(message);
            $('#addItemProductModal').modal('hide');
        });

        Livewire.on('itemProductInfoUpdated', message => {
            toastr.success(message);
            $('#updateItemProductModal').modal('hide');
        });

        Livewire.on('itemProductStockUpdated', message => {
            toastr.success(message);
            $('#updateItemStockModal').modal('hide');
        });

        Livewire.on('itemProductInfoShow', message => {
            toastr.error(message);
            $('#showItemProductModal').modal('hide');
        });

        Livewire.on('itemProductDeleted', message => {
            toastr.success(message);
            $('#deleteItemProductModal').modal('hide');
        });

        Livewire.on('closeModal', function () {
            $('#showItemProductOffcanvas').modal('hide');
        });

        Livewire.on('ItemRequested', message => {
            toastr.success(message);
            $('#requestItemProductModal').modal('hide');
        });

        $(document).ready(function(){
            //compute total stock
            $("#current_item_stock,#new_item_stock").keyup(function(){
                calculateTotalStock();
            });
            $("#subcategory_id").change(function(){
                var subcategoryId = $(this).val();
                $.ajax({
                    url: "{{ route('get-category-name') }}",
                    type: "GET",
                    data: {subcategory_id: subcategoryId},
                    success: function(response) {
                        $("#category_name").val(response.category_name);
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        // You can customize the error handling here
                        toastr('Error - ' + errorMessage);
                        // You might want to handle the error more gracefully, such as displaying a message to the user
                    }
                });
            });
        });

        function calculateTotalStock() {
            var currentStock = parseInt($("#current_item_stock").val()) || 0;
            var newStock = parseInt($("#new_item_stock").val()) || 0;
            var totalStock = currentStock + newStock;
            $("#total_stock").val(totalStock);
        }
    </script>
@endsection
