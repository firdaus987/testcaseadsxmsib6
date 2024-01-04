@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 ">
            <div class="row ">
            <!-- <div class="col-md-8"> -->
                <div class="card ">
                    <!-- <div class="card-header">{{ __('Masuk') }}</div> -->

                    <div class="card-body">

                        <h3 class="fw-bolder">Selamat datang!</h3><br>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Saya') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Lupa Kata Sandi?') }}
                                            </a>
                                        @endif
                                    </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-2 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Masuk') }}
                                    </button> 
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right side columns -->
        <div class="col-lg-6 hero-image">
            <div class="card-body">

            </div>
        </div><!-- End Recent Activity -->
    </div>
</div>
@endsection
