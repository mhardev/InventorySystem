<div class="col-2 mb-4">
    <div class="card {{ $bgName }}">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
                <i class="bx {{ $icon }} text-white" style="font-size: 3rem;"></i>
            </div>
            </div>
            <span class="d-block mb-1 text-white">{{ $displayName }}</span>
            <h4 class="card-title text-nowrap mb-2 text-white">{{ $totalCounts }}</h4>
            <a href="{{ url('admin/{{ $url }}') }}" type="button" class="btn btn-primary">View Details</a>
        </div>
    </div>
</div>
