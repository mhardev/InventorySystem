//Request Report Bar Chart
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
