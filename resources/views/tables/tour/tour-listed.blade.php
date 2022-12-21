<div class="col-12 col-xl-4">
    <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <h6 class="mb-0">
                Wisata
            </h6>
        </div>
        <div class="card-body p-3">
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">
                Detail Wisata
            </h6>
            <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                    <div>
                        Nama : {{ $tour->name }}
                    </div>
                </li>
                <li class="list-group-item border-0 px-0">
                    <div>
                        Deskripsi : {{ $tour->description }}
                    </div>
                </li>
                <li class="list-group-item border-0 px-0">
                    <div>
                        Nomer Kontak : {{ $tour->contact }}
                    </div>
                </li>
                <li class="list-group-item border-0 px-0">
                    <div>
                        Penanggung Jawab : {{ $tour->responsible }}
                    </div>
                </li>
                <li class="list-group-item border-0 px-0">
                    <div>
                        Action : 
                        <a href="{{ route('wisata.edit', $tour->id) }}">
                            Edit
                        </a> 
                        | 
                        <a href="{{ route('wisata.delete', $tour->id) }}" class="button delete-confirm">
                            Delete
                        </a>
                    </div>
                </li>
            </ul>
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">
                Alamat
            </h6>
            <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                    <div>
                        {{ $tour->address }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>