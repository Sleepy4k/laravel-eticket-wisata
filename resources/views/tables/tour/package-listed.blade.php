<div class="col-12 col-xl-4">
    <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <h6 class="mb-0">
                Paket
            </h6>
        </div>
        <div class="card-body p-3">
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">
                List Paket | 
                <a href="{{ route('paket.add', $tour->id) }}">
                    Tambah
                </a>
            </h6>
            @forelse ($packages as $package)
                <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Nama : {{ $package->name }}
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Deskripsi : {{ $package->description }}
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Harga : {{ $package->price }}
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Action : 
                            <a href="{{ route('paket.edit', $package->id) }}">
                                Edit
                            </a> 
                            | 
                            <a href="{{ route('paket.delete', $package->id) }}" class="button delete-confirm">
                                Delete
                            </a>
                        </div>
                    </li>
                    <div>
                        --------------------------------
                    </div>
                </ul>
                @empty
                <ul>
                    <div>
                        --------------------------------
                    </div>
                </ul>
            @endforelse
        </div>
    </div>
</div>