@extends('layouts.pages.main')

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Add Paket
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <form action="{{ route('paket.store') }}" method="post" class="text-start m-3">
                                        @csrf
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">
                                                Nama Paket
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
                                                Harga Paket
                                            </label>
                                            <input name="price" id="price" type="number" class="form-control" value="{{ old('price') }}" min="1" required autofocus>
                                        </div>

                                        @error('price')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">
                                                Deskripsi Paket
                                            </label>
                                            <input name="description" id="description" type="text" class="form-control" value="{{ old('description') }}" required autofocus>
                                        </div>

                                        @error('description')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        
                                        <input name="tour_id" id="tour_id" type="hidden" class="form-control" value="{{ $data[2] }}">

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