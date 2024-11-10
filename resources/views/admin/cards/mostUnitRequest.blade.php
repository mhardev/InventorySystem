<div class="col-md-6 col-lg-4 col-xl-4 mb-4">
    <div class="card h-auto">
        <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
                <h5 class="m-0 me-2">Most Unit Request Per Month</h5>
            </div>
            <div class="dropdown">
                <button
                    class="btn p-0"
                    type="button"
                    id="orederStatistics"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                    <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column align-items-center gap-1">
                    @foreach($mostUnitRequests as $request)
                        <div class="mb-2">
                            <h2>{{ $request->department }}</h2>
                            <span>Total Request: {{ $request->total_requests }}</span>
                        </div>
                    @endforeach
                </div>
                <div id="orderStatisticsChart"></div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    'use strict';

    (function () {
        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.cardColor;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        // Fetch data from Blade
        const mostUnitRequests = {!! json_encode($mostUnitRequests) !!};

        // Order Statistics Chart
        // --------------------------------------------------------------------
        const chartOrderStatistics = document.querySelector('#orderStatisticsChart');
        if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
            const departments = ['SIKAP Unit', 'UNIFAST Unit', 'Records Unit', 'MIS Unit', 'Cash Unit', 'SMART Unit', 'Accounting Unit', 'Technical Unit'];
            const colors = [config.colors.primary, config.colors.textMuted, config.colors.warning, config.colors.secondary, config.colors.dark, config.colors.success, config.colors.danger, config.colors.info];

            const orderChartConfig = {
                chart: {
                    height: 165,
                    width: 130,
                    type: 'donut'
                },
                labels: departments,
                series: [30, 85, 75, 15, 40, 40, 50, 50],
                colors: colors,
                stroke: {
                    width: 5,
                    colors: [cardColor]
                },
                dataLabels: {
                    enabled: false,
                    formatter: function (val, opt) {
                        return parseInt(val) + '%';
                    }
                },
                legend: {
                    show: false
                },
                grid: {
                    padding: {
                        top: 0,
                        bottom: 0,
                        right: 15
                    }
                },
                states: {
                    hover: {
                        filter: { type: 'none' }
                    },
                    active: {
                        filter: { type: 'none' }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '75%',
                            labels: {
                                show: true,
                                value: {
                                    fontSize: '1.5rem',
                                    fontFamily: 'Public Sans',
                                    color: headingColor,
                                    offsetY: -15,
                                    formatter: function (val) {
                                        return parseInt(val) + '%';
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: 'Public Sans'
                                },
                                total: {
                                    show: true,
                                    fontSize: '0.8125rem',
                                    color: axisColor,
                                    label: 'Monthly',
                                    formatter: function (w) {
                                        return '38%';
                                    }
                                }
                            }
                        }
                    }
                }
            };

            // Dynamically set series and labels
            mostUnitRequests.forEach(request => {
                orderChartConfig.labels.push(request.department);
                orderChartConfig.series.push(request.total_requests);
            });

            const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
            statisticsChart.render();
        }
    })();
</script>
@endsection
