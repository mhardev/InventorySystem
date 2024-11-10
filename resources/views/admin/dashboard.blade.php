@extends('layouts.admin')
@section('dashboard_select', 'active')
@section('content')

<div>
    <h3 class="mb-4">Dashboard</h3>
    <!-- Basic Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 12px">
          <li class="breadcrumb-item">
            <a href="{{url('admin/dashboard')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Analytics</li>
        </ol>
    </nav>
    <!-- Basic Breadcrumb -->

    <!-- Cards -->
    <div class="card">
        <!-- Generate Reports Button-->
        <div class="dropdown nav nav-pills flex-column flex-md-row mb-3">
            <h5 class="card-header">Analytics and Reports</h5>
            <button
                class="d-block my-3 ml-auto btn btn-secondary add-new btn-primary dropdown-toggle hide-arrow"
                tabindex="0" aria-controls="Genarate_Reports"
                type="button" data-bs-toggle="dropdown" data-bs-target="#"
                style="margin-right: 1.3%;">
                <span>
                    <i class="bx bx-detail me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Generate Reports</span>
                </span>
            </button>
            <div class="dropdown-menu">
                <button type="button" class="dropdown-item" data-bs-toggle="" data-bs-target="#"><i class="bx bx-file me-2"></i> Generate Document Reports</button>
                <button type="button" class="dropdown-item" data-bs-toggle="" data-bs-target="#"><i class="bx bx-table me-2"></i> Generate Spreadsheet Reports</button>
            </div>
        </div>
        <div class="row mx-2">
            <div class="col-4">
                <div class="row mx-2">
                    <div class="col-6 mb-4">
                        <div class="card bg-secondary">
                            <div class="card-body" style=" text-align:center;">
                                <div class="card-title d-flex align-items-start justify-content-between mb-0">
                                    <div class="avatar flex-shrink-0" style="display: flex;">
                                        <i class="bx bx-user text-white" style="font-size: 2rem; padding-left: 20%; padding-right: 60%;"></i>
                                        <h4 class="card-title mb-2 text-white">{{$totalUsers}}</h4>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1 text-white" style="font-size: 12px;">Users</span>
                                <a href="{{url('admin/users')}}" type="button" class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card bg-info">
                            <div class="card-body" style=" text-align:center;">
                                <div class="card-title d-flex align-items-start justify-content-between mb-0">
                                    <div class="avatar flex-shrink-0" style="display: flex;">
                                        <i class="bx bx-category text-white" style="font-size: 2rem; padding-left: 20%; padding-right: 60%;"></i>
                                        <h4 class="card-title mb-2 text-white">{{$totalSubCategories}}</h4>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1 text-white" style="font-size: 12px;">Sub Categories</span>
                                <a href="{{url('admin/sub-categories')}}" type="button" class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-6 mb-4">
                        <div class="card bg-gray">
                            <div class="card-body" style=" text-align:center;">
                                <div class="card-title d-flex align-items-start justify-content-between mb-0">
                                    <div class="avatar flex-shrink-0" style="display: flex;">
                                        <i class="bx bx-collection text-white" style="font-size: 2rem; padding-left: 20%; padding-right: 60%;"></i>
                                        <h4 class="card-title mb-2 text-white">{{$totalBrands}}</h4>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1 text-white" style="font-size: 12px;">Total Brands</span>
                                <a href="{{url('admin/item-brands')}}" type="button" class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card bg-warning">
                            <div class="card-body" style=" text-align:center;">
                                <div class="card-title d-flex align-items-start justify-content-between mb-0">
                                    <div class="avatar flex-shrink-0" style="display: flex;">
                                        <i class="bx bx-package text-white" style="font-size: 2rem; padding-left: 20%; padding-right: 60%;"></i>
                                        <h4 class="card-title mb-2 text-white">{{$totalItems}}</h4>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1 text-white" style="font-size: 12px;">Total Products</span>
                                <a href="{{url('admin/item-products')}}" type="button" class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    @include('admin.charts.itemRequestBarChart')
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    @include('admin.charts.performanceChart')
                </div>
            </div>
        </div>
        <div class="row mx-2">
            @include('admin.cards.mostLowestStocks')
            <!-- Order Statistics -->
            @include('admin.cards.mostUnitRequest')
            <!--/ Order Statistics -->
            <!-- Transactions -->
            @include('admin.cards.mostUsedItems')
            <!--/ Transactions -->
        </div>
    </div>
</div>
@endsection
