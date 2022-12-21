@extends('layouts.pages.main')

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Edit Penjualan
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <form action="{{ route('penjualan.update', $data[2]) }}" method="post" class="text-start m-3">
                                        @csrf
                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label">
                                                Waktu
                                            </label>
                                            <input style="text-align:center" name="time" id="time" type="date" class="form-control" value="{{old('time', $transaction->time)}}" required autofocus>
                                        </div>

                                        @error('time')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label">
                                                Jumlah
                                            </label>
                                            <input name="amount" id="amount" type="text" class="form-control" value="{{old('amount', $transaction->amount)}}" required autofocus>
                                        </div>

                                        @error('amount')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="form-check">
                                            <input value="sudah" class="form-check-input" type="radio" name="status" id="status" @if ($transaction->status == "Sudah dibayar") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Sudah Bayar
                                            </label>
                                            <input value="belum" class="form-check-input" type="radio" name="status" id="status" @if ($transaction->status == "Belum dibayar") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Belum Bayar
                                            </label>
                                        </div>

                                        @error('status')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label">
                                                Harga
                                            </label>
                                            <input name="price" id="price" type="text" class="form-control" value="{{old('price', $transaction->price)}}" required autofocus>
                                        </div>

                                        @error('price')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label">
                                                ID Paket
                                            </label>
                                            <input name="package_id" id="package_id" type="text" class="form-control" value="{{old('package_id', $transaction->package_id)}}" required autofocus>
                                        </div>

                                        @error('package_id')
                                            <span class="error-display">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                        <div class="input-group input-group-outline my-3 is-filled">
                                            <label class="form-label">
                                                ID User
                                            </label>
                                            <input name="user_id" id="user_id" type="text" class="form-control" value="{{old('user_id', $transaction->user_id)}}" required autofocus>
                                        </div>

                                        @error('user_id')
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