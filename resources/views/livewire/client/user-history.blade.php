<div>
    <div>
        <h3 class="mb-4">User History</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('client/homepage')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">User History</li>
            </ol>
        </nav>

        <div class="nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>History List</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="userHistoryDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => '#',
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'request_id',
                                'displayName' => 'Product Name',
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'history_details',
                                'displayName' => 'History Details',
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'created_at',
                                'displayName' => 'Date Time',
                            ])
                            <th class="px-0 py-3 noselect">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($userhistory as $history)
                        <tr align="center">
                            <td>{{ $history->id }}</td>
                            <td>{{ $history->itemrequest->product->item_name }}</td>
                            <td>{{ $history->history_details }}</td>
                            <td>{{ $history->created_at }}</td>
                            <td>
                                <a href="{{url('client/item-requests')}}"
                                        type="button"
                                        class="btn btn-info"
                                        style="width: 10px">
                                    <i class="bx bx-info-circle small"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.client.includes.table-perpage')
                    <br>
                    {{ $userhistory->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
