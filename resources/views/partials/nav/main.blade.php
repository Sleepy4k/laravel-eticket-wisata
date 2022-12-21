<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                @foreach ($data[1] as $path)
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">
                        {{$path}}
                    </li>
                @endforeach
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">
                            {{ auth()->user()->username }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-1 py-1 me-sm-1" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <div class="dropdown-item border-radius-md">
                                <a href="{{ route('home.profile') }}">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h3 class="text-sm mb-1">
                                                Profile 
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-item border-radius-md">
                                <a href="{{ route('signout') }}">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h3 class="text-sm mb-1">
                                                Sign Out 
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>