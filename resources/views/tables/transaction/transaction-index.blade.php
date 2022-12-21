<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <a href="{{ route('penjualan.add') }}"> 
                <button type="button" class="btn bg-gradient-info mx-3 z-index-2 ps-3">
                    Tambah Penjualan
                </button>
            </a>
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Nomer Tiket
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Waktu
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Jumlah 
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Status
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        ID Paket
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        ID User
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Harga
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->tiket_number }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->time }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->amount }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->status }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->package_id }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $transaction->user_id }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $currency->format($transaction->price) }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('penjualan.edit', $transaction->id) }}">
                                Edit
                            </a>
                            <span> | </span>
                            <a href="{{ route('penjualan.delete', $transaction->id) }}" class="button delete-confirm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan=9 style="text-align: center;"> 
                            Belum Ada Data Yang Tersedia 
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>