@extends('layouts.pages.main')

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Add Role
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <form action="{{ route('role.store') }}" method="post" class="text-start m-3">
                                        @csrf
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">
                                                Nama Role
                                            </label>
                                            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}" required autofocus>
                                        </div>
                                        
                                        @error('name')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Guard Name
                                            </label>
                                            <input name="guard_name" id="guard_name" type="text" class="form-control" value="{{ old('guard_name') }}" required autofocus>
                                        </div>

                                        @error('guard_name')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <div class="d-flex mb-5">
                                                <label class="form-label mb-5">
                                                    Akses Halaman
                                                </label>    
                                            </div>

                                            <div class="d-flex flex-column mt-5">
                                            @foreach ($permissions as $perm)
                                                <p><input type="checkbox" name="permissions[]" value="{{ $perm->id }}"/> {{ $perm->name }}</p>
                                            @endforeach
                                            </div>
                                        </div>

                                        @error('permissions')
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