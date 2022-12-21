<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <a href="{{ route('akun.add') }}"> 
                <button type="button" class="btn bg-gradient-info mx-3 z-index-2 ps-3">
                    Tambah Akun
                </button>
            </a>
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Username
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        No Handphone
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Email
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Role
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $user->username }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $user->phone_number }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $user->email }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $user->roles->pluck('name')[0] }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('akun.edit', $user->id) }}">
                                Edit
                            </a>
                            <span> | </span>
                            <a href="{{ route('akun.delete', $user->id) }}" class="button delete-confirm">
                                Delete
                            </a>
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
        </table>
        {{ $users->links() }}
    </div>
</div>