<!-- itemRequestBarChart.blade.php -->
<div class="col mb-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Issued Item Reports</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performanceId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performanceId" style="">
                    <a class="dropdown-item" href="{{url('admin/item-requests')}}">View all Requested Items</a>
                    <a class="dropdown-item" href="{{url('admin/request-reports')}}">View all Issued Items</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="itemRequestChart"></canvas>
        </div>
    </div>
</div>
@section('script')
<script>
    var ctx = document.getElementById('itemRequestChart').getContext('2d');

    // Fetch data from the barChart endpoint
    fetch("{{ route('admin.barchart') }}")
    .then(response => response.json())
    .then(data => {
        var itemRequestChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pending', 'Approved', 'Cancelled'],
                datasets: [{
                    label: '# of Requests',
                    data: [data.pending, data.approved, data.cancelled],
                    backgroundColor: [
                        'rgba(3, 195, 236, 0.8)',
                        'rgba(113, 221, 55, 0.8)',
                        'rgba(255, 62, 29, 0.8)'
                    ],
                    borderColor: [
                        'rgba(3, 195, 236, 1)',
                        'rgba(113, 221, 55, 1)',
                        'rgba(255, 62, 29, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
