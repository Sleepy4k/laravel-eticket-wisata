<div class="col-12 col-xl-4">
    <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">
                        Profile Information
                    </h6>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('profile.edit', $user->id) }}">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                    <strong class="text-dark">
                        Username :
                    </strong>
                    &nbsp; {{ $user->username }}
                </li>
                <li class="list-group-item border-0 ps-0 text-sm">
                    <strong class="text-dark">
                        Handphone :
                    </strong>
                    &nbsp; {{ $user->phone_number }}
                </li>
                <li class="list-group-item border-0 ps-0 text-sm">
                    <strong class="text-dark">
                        Email :
                    </strong>
                    &nbsp; {{ $user->email }}
                </li>
                <li class="list-group-item border-0 ps-0 text-sm">
                    <strong class="text-dark">
                        Position :
                    </strong>
                    &nbsp; {{ $user->roles->pluck('name')[0] }}
                </li>
            </ul>
        </div>
    </div>
</div>