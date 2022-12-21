@extends('layouts.pages.main')

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Add Menu
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <form action="{{ route('menu.store') }}" method="post" class="text-start m-3">
                                        @csrf
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">
                                                Nama Menu
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
                                                Icon Menu
                                            </label>
                                            <input name="icon" id="icon" type="text" class="form-control" value="{{ old('icon') }}" required autofocus>
                                        </div>

                                        @error('icon')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Akses
                                            </label>
                                            <select id="permission" name="permission" class="form-select" style="text-align: center;">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">
                                                        {{ $permission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('permission')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Kategori
                                            </label>
                                            <select id="category" name="category" class="form-select" style="text-align: center;">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('category')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                ID Halaman
                                            </label>
                                            <select id="page_id" name="page_id" class="form-select" style="text-align: center;">
                                                @foreach ($pages as $page)
                                                    <option value="{{ $page->id }}">
                                                        {{ $page->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('page_id')
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