<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <a href="{{ route('category.add') }}"> 
                <button type="button" class="btn bg-gradient-info mx-3 z-index-2 ps-3">
                    Tambah Category
                </button>
            </a>
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Permisions
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $value)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $value->name }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ $value->permission }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('category.edit', $value->id) }}">
                                Edit
                            </a>
                            <span> | </span>
                            <a href="{{ route('category.delete', $value->id) }}" class="button delete-confirm">
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
        {{ $category->links() }}
    </div>
</div>