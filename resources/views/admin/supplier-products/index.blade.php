@extends('layouts.admin')

@section('supplier_select', 'active')

@section('supplierproduct_select', 'active')

@section('title', 'Supplier Product List')

@section('content')
<div>
    <livewire:supplier-products>
</div>
@endsection
