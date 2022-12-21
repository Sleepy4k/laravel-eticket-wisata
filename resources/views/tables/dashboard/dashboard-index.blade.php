<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>
                Penjualaan
            </h6>
            <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">
                    {{ count($transactions) }} transaksi berhasil hari ini
                </span>
            </p>
        </div>
    </div>
</div>
<div class="card-body px-0 pb-2">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No Tiket
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Jumlah
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Paket
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Harga
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions->take(6) as $transaction)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->tiket_number}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->amount}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->status}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->package_id}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->price}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan=6 style="text-align: center;"> 
                            Belum Ada Data Yang Tersedia 
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                @if (!empty($transaction))
                    <tr>
                        <td colspan=6 style="text-align: center;">
                            <a href="{{ route('home.penjualan') }}">
                                Lihat Semua
                            </a>
                        </td>
                    </tr>
                @endif
            </tfoot>    
        </table>
    </div>
</div>