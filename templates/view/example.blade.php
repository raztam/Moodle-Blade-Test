<div class="local_blade_test">

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Blade Demo</h4>
                <span class="badge badge-pill badge-primary">{{ count($items) }} items</span>
            </div>

            <div class="mb-4">
                @if($showmessage)
                    <div class="p-3 border-left border-info pl-4" style="border-left-width: 4px !important;">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
            </div>

            <div class="row">
                @foreach($items as $index => $item)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 {{ $index % 2 == 0 ? 'bg-light' : '' }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">Item {{ $index + 1 }}</h5>
                                <p>{{ $item }}</p>
                                <span class="text-muted small">
                                    @if($loop->first)
                                        First item
                                    @elseif($loop->last)
                                        Last item
                                    @else
                                        Middle item
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>