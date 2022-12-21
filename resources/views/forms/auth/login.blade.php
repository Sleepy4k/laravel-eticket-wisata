@error('message')
    <x-alerts :message="$errors->first('message')" />
@enderror

<div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                    Sign in
                </h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('signin.post') }}" method="post" class="text-start">
                @csrf
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">
                        Username
                    </label>
                    <input name="username" id="username" type="text" class="form-control">
                </div>
                
                @error('username')
                    <span class="error-display">
                        {{ $message }}
                    </span>
                @enderror

                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">
                        Password
                    </label>
                    <input name="password" id="password" type="password" class="form-control">
                </div>

                @error('password')
                    <span class="error-display">
                        {{ $message }}
                    </span>
                @enderror

                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>