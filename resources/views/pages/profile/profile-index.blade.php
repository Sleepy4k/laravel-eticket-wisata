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
                    
                    @include('tables.profile.profile-biograph')

                    @include('tables.profile.profile-message')
                </div>
            </div>
        </div>
    </div>
@endsection