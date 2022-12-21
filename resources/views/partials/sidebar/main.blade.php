<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}">
            <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo"/>
            <span class="ms-1 font-weight-bold text-white">
                Dadidu Dashboard
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2" />
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach ($categories as $category)
                @can($category->permission)
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                            {{ $category->name }}
                        </h6>
                    </li>
                    @foreach ($menus as $menu)
                        @if ($menu->category == $category->id)
                            @foreach ($pages as $page)
                                @if ($page->id == $menu->page_id)
                                    @can($menu->permission)
                                        <li class="nav-item">
                                            <a class="nav-link text-white @if (Request::segment(2) == $menu->name) active bg-gradient-info @endif" href="{{ route($page->page_url) }}">
                                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                    <i class="material-icons opacity-10">
                                                        {{ $menu->icon }}
                                                    </i>
                                                </div>
                                                <span class="nav-link-text ms-1">
                                                    {{ $page->label }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endcan
            @endforeach
        </ul>
    </div>
</aside>