<div>
    <div>
        <h3 class="mb-4">Account Profile</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
            <li class="breadcrumb-item">
                <a href="{{url('client/homepage')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Account Profile</li>
            </ol>
        </nav>

        <div class="nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>User Notification Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="userNotificationsDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            <th class="px-0 py-3 noselect">#</th>
                            <th class="px-0 py-3 noselect">Request #</th>
                            <th class="px-0 py-3 noselect">Notification Details</th>
                            <th class="px-0 py-3 noselect">Product Name</th>
                            <th class="px-0 py-3 noselect">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($usernotifications as $notification)
                        <tr align="center">
                            <td>{{ $notification->id }}</td>
                            <td>{{ $notification->request_id }}</td>
                            <td>{{ $notification->notification_details }}</td>
                            <td>{{ $notification->itemrequest->product->item_name }}</td>
                            <td>
                                <button type="button"
                                        class="btn btn-info"
                                        style="width: 10px"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showItemRequestModal">
                                    <i class="bx bx-info-circle small"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
