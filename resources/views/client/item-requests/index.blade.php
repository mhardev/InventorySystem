@extends('layouts.client')

@section('itemrequest_select', 'active')

@section('title', 'Item Request List')

@section('content')
<div>
    <livewire:client.item-requests>
</div>
@endsection

@section('script')
    <script>
        Livewire.on('itemRequestDetailShow', message => {
            toastr.error(message);
            $('#showItemRequestModal').modal('hide');
        });

        Livewire.on('RequestItemQuantityUpdated', message => {
            toastr.success(message);
            $('#updateRequestQuantityModal').modal('hide');
        });

        $(document).ready(function(){
            $("current_request_stock,#new_request_stock").keyup(function(){
                calculateTotalQuantity();
            });
        });

        function calculateTotalQuantity() {
            var currentQuantity = parseInt($("#current_request_stock").val()) || 0;
            var newQuantity = parseInt($("#new_request_stock").val()) || 0;
            var totalQuantity = currentQuantity + newQuantity;
            $("#total_request_stock").val(totalQuantity);
        }
    </script>
@endsection
