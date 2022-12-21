<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <a href="{{ route('wisata.add') }}"> 
                <button type="button" class="btn bg-gradient-info mx-3 z-index-2 ps-3">
                    Tambah Wisata
                </button>
            </a>
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Nama Wisata
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Deskripsi
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Nomer Kontak
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Penanggung Jawab
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        User ID
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Lokasi
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Alamat
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tours as $tour)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->name }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->description }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->contact }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->responsible }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->user_id }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->latitude }} | {{ $tour->longitude }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $tour->address }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('wisata.detail', $tour->id) }}">
                                Detail
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
        {{ $tours->links() }}
    </div>
</div>