<div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card h-auto">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Most Lowest Stock Items</h5>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                @forelse ($lowestProducts as $product)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{ asset('public/storage/uploads/products/' . $product->item_image) }}" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <small class="text-muted d-block mb-1">{{ $product->subcategory->category->category_name }}</small>
                            <h6 class="mb-0" style="font-size: 13px;">{{ $product->item_name }}</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            @if ($product->item_stock < 6)
                            <h6 class="mb-0 badge btn-danger">{{ $product->item_stock }}</h6>
                            @elseif ($product->item_stock < 21)
                            <h6 class="mb-0 badge btn-warning">{{ $product->item_stock }}</h6>
                            @else
                            <h6 class="mb-0 badge btn-success">{{ $product->item_stock }}</h6>
                            @endif
                        </div>
                    </div>
                </li>
                @empty
                <p>No items found.</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
