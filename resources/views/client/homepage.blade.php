@extends('layouts.client')
@section('dashboard_select', 'active')
@section('content')
<div>
    <h3 class="mb-4">Homepage</h3>
    <!-- Basic Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 12px">
          <li class="breadcrumb-item">
            <a href="{{url('client/homepage')}}">Home</a>
          </li>
          <li class="breadcrumb-item active">Analytics</li>
        </ol>
    </nav>
    <!-- Basic Breadcrumb -->
    <div class="card">
        <div class="dropdown nav nav-pills flex-column flex-md-row mb-3">
            <h5 class="card-header">Analytics and Reports</h5>
        </div>
    </div>
</div>
@endsection
