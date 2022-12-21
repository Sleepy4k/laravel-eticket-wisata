<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <a href="{{ route('role.add') }}"> 
                <button type="button" class="btn bg-gradient-info mx-3 z-index-2 ps-3">
                    Tambah Role
                </button>
            </a>
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        ID
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Guard Name
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $role->id }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $role->name }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $role->guard_name }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('role.edit', $role->id) }}">
                                Edit
                            </a>
                            <span> | </span>
                            <a href="{{ route('role.delete', $role->id) }}" class="button delete-confirm">
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
        {{ $roles->links() }}
    </div>
</div>