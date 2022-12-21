@extends('layouts.pages.main')

@section('header')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Edit Wisata
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <form action="{{ route('wisata.update', $data[2]) }}" method="post" class="text-start m-3">
                                        @csrf
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label">
                                                Nama Wisata
                                            </label>
                                            <input name="name" id="name" type="text" class="form-control" value="{{ old('name', $tour->name) }}" required autofocus>
                                        </div>
                                        
                                        @error('name')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">
                                                Deskripsi Wisata
                                            </label>
                                            <input name="description" id="description" type="text" class="form-control" value="{{ old('description', $tour->description) }}" required autofocus>
                                        </div>

                                        @error('description')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">
                                                Latitude
                                            </label>
                                            <input name="latitude" id="latitude" type="text" class="form-control" value="{{ old('latitude', $tour->latitude) }}" required autofocus>
                                        </div>

                                        @error('latitude')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">
                                                Longitude
                                            </label>
                                            <input name="longitude" id="longitude" type="text" class="form-control" value="{{ old('longitude', $tour->longitude) }}" required autofocus>
                                        </div>

                                        @error('longitude')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror  

                                        <div id='map' style='width: 400px; height: 300px;'></div>

                                        <div class="input-group input-group-outline mb-3 mt-3 is-filled">
                                            <label class="form-label">
                                                Nomer Kontak
                                            </label>
                                            <input name="contact" id="contact" type="text" class="form-control" value="{{ old('contact', $tour->contact) }}" required autofocus>
                                        </div>

                                        @error('contact')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">
                                                Penanggung Jawab
                                            </label>
                                            <input name="responsible" id="responsible" type="text" class="form-control" value="{{ old('responsible', $tour->responsible) }}" required autofocus>
                                        </div>

                                        @error('responsible')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">
                                                User ID
                                            </label>
                                            <input name="user_id" id="user_id" type="number" class="form-control" value="{{ old('user_id', $tour->user_id) }}" min="1" required autofocus>
                                        </div>

                                        @error('user_id')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <input name="address" id="address" type="hidden" class="form-control" value="">

                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">
                                                Alamat
                                            </label>
                                            <input name="address" id="address" type="text" class="form-control" value="{{ old('address', $tour->address) }}" required autofocus>
                                        </div>

                                        @error('address')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">
                                                Edit
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

@section('addon')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js'></script>
    <script src="{{ asset('js/material-mapbox.js') }}"></script>
@endsection