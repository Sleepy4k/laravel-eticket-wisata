<div class="col-12 col-xl-4">
    <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <h6 class="mb-0">
                Fasilitas
            </h6>
        </div>
        <div class="card-body p-3">
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">
                List Fasilitas | 
                <a href="{{ route('fasilitas.add', $tour->id) }}">
                    Tambah
                </a>
            </h6>
            @forelse ($facilities as $facility)
                <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Nama : {{ $facility->name }}
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Deskripsi : {{ $facility->description }}
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div>
                            Action : 
                            <a href="{{ route('fasilitas.edit', $facility->id) }}">
                                Edit
                            </a>
                            |
                            <a href="{{ route('fasilitas.delete', $facility->id) }}" class="button delete-confirm">
                                Delete
                            </a>
                        </div>
                    </li>
                    <div>
                        --------------------------------
                    </div>
                </ul>
                @empty
                <ul class="list-group">
                    <div>
                        --------------------------------
                    </div>
                </ul>
            @endforelse
        </div>
    </div>
</div>