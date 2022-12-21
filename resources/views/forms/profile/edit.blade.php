@extends('layouts.pages.main')

@section('main')
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask bg-gradient-info opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->username }}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{ $user->roles->pluck('name')[0] }}
                        </p>
                    </div>
                </div>
                @include('tables.profile.profile-nav')
            </div>
            <div class="row">
                <div class="row">
                    @include('tables.profile.profile-setting')
                    
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">
                                            Profile Information
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <form action="{{ route('profile.update', $data[2]) }}" method="post">
                                    @csrf
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">
                                                Username :
                                            </strong> 
                                            &nbsp; 
                                            <input name="username" id="username" type="text" value="{{ old('username', $user->username) }}" required autofocus>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm">
                                            <strong class="text-dark">
                                                Handphone :
                                            </strong> 
                                            &nbsp; 
                                            <input name="phone_number" id="phone_number" type="text" value="{{ old('phone_number', $user->phone_number) }}" required autofocus>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm">
                                            <strong class="text-dark">
                                                Email :
                                            </strong> 
                                            &nbsp; 
                                            <input name="email" id="email" type="email" value="{{ old('email', $user->email) }}" required autofocus>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm">
                                            <strong class="text-dark">
                                                Position :
                                            </strong> 
                                            &nbsp; {{ $user->roles->pluck('name')[0] }}
                                        </li>
                                    </ul>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">
                                            Edit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('tables.profile.profile-message')
                </div>
            </div>
        </div>
    </div>
@endsection