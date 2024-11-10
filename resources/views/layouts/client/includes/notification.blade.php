@if(isset($usernotifications) && $usernotifications->count() > 0)
    <li class="nav-item navbar-dropdown dropdown-notifications dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-bell bx-sm"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $usernotifications->count() }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0" data-bs-popper="static">
            <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">Notifications</h5>
                    <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark all as read" data-bs-original-title="Mark all as read">
                        <i class="bx fs-4 bx-envelope-open"></i>
                    </a>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container ps">
                <ul class="list-group list-group-flush">
                    @foreach ($usernotifications as $notification)
                        @php
                            $itemRequest = $itemRequests->where('id', $notification->request_id)->first();
                        @endphp
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Notification ID No.: {{ $notification->id }}</h6>
                                    <p class="mb-0">{{ $notification->notification_details }}</p>
                                    @if($itemRequest)
                                        <p class="mb-0">Item Request ID: {{ $itemRequest->id }}</p>
                                        <p class="mb-0">Status: {{ $itemRequest->status == 1 ? 'Approved' : ($itemRequest->status == 2 ? 'Cancelled' : 'Pending') }}</p>
                                        <p class="mb-0">Product Name: {{ $itemRequest->product->item_name }}</p>
                                    @endif
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown-menu-footer border-top p-3">
                <a class="btn btn-primary text-uppercase w-100" href="{{ url('client/user-notifications') }}">View all notifications</a>
            </li>
        </ul>
    </li>
@else
    <li class="nav-item navbar-dropdown dropdown-notifications dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-bell bx-sm"></i>
            <span class="badge bg-secondary rounded-pill badge-notifications">0</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0" data-bs-popper="static">
            <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">Notifications</h5>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container ps">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="mb-0">No new notifications.</p>
                    </li>
                </ul>
            </li>
            <li class="dropdown-menu-footer border-top p-3">
                <a class="btn btn-primary text-uppercase w-100" href="{{ url('client/user-notifications') }}">View all notifications</a>
            </li>
        </ul>
    </li>
@endif
