<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Kategori
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Deskripsi
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Subject
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        User
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Konten
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Dibuat Pada
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Update Terakhir
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activities as $activity)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $activity->log_name }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $activity->description }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        @if ($activity->subject_id)
                                            {{ $activity->subject_id }}
                                        @else
                                            -
                                        @endif
                                        |
                                        @if ($activity->subject_type)
                                            {{ $activity->subject_type }}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        @if ($activity->causer_id)
                                            {{ $activity->causer_id }}
                                        @else
                                            -
                                        @endif
                                        |
                                        @if ($activity->causer_type)
                                            {{ $activity->causer_type }}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $activity->properties }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $activity->created_at }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $activity->updated_at }}
                                    </h6>
                                </div>
                            </div>
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
        {{ $activities->links() }}
    </div>
</div>