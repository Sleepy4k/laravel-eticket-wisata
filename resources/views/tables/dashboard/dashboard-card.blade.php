<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">
                    weekend
                </i>
            </div>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                    Pendapatan hari ini
                </p>
                <h4 class="mb-0">
                    {{ $currency->format($transactions->sum('price')) }}
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">
                    weekend
                </i>
            </div>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                    Total penjualan hari ini
                </p>
                <h4 class="mb-0">
                    {{ count($transactions) }}
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-sm-6">
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">
                    weekend
                </i>
            </div>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                    Tiket terjual hari ini
                </p>
                <h4 class="mb-0">
                    {{ $transactions->sum('amount') }}
                </h4>
            </div>
        </div>
    </div>
</div>