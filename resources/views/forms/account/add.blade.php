@extends('layouts.pages.main')

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Add Akun
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <form action="{{ route('akun.store') }}" method="post" class="text-start m-3">
                                        @csrf
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">
                                                Username
                                            </label>
                                            <input name="username" id="username" type="text" class="form-control" value="{{ old('username') }}" required autofocus>
                                        </div>
                                        
                                        @error('username')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">
                                                Role
                                            </label>
                                            <select id="role" name="role" class="form-select" style="text-align: center;">
                                                @foreach($roles as $role) 
                                                    <option value="{{ $role->name }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('role')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Nomer Handphone
                                            </label>
                                            <input name="phone_number" id="phone_number" type="text" class="form-control" value="{{ old('phone_number') }}" required autofocus>
                                        </div>

                                        @error('phone_number')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Email
                                            </label>
                                            <input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                        </div>

                                        @error('email')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Password
                                            </label>
                                            <input name="password" id="password" type="password" class="form-control" value="{{ old('password') }}" required autofocus>
                                        </div>

                                        @error('password')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Confirm Password
                                            </label>
                                            <input name="confirm_password" id="confirm_password" type="password" class="form-control" value="{{ old('confirm_password') }}" required autofocus>
                                        </div>

                                        @error('confirm_password')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">
                                                Tambahkan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection