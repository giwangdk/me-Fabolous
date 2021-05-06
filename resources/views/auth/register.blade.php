@extends('layouts.auth')

@section('content')
<div class="row login-page">
    <div class="col-lg-5 col-md-12" data-aos="fade-right">
        <img src="/images/ineke/WhatsApp Image 2021-04-01 at 7.04.31 AM.jpeg" class="w-100" alt="">
    </div>
    <div class="col-md-7 col-12 d-flex flex-column align-items-center" data-aos="fade-right">
        <h1 >Make <br> your account.</h1>
        <div class="card border-0 p-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3 ">
                    <label for="name" class="form-label">Nama</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-login w-100">Register</button>
            </form>
            <a href="{{route('login')}}" class="btn btn-register mt-2">Login</a>
        </div>
    </div>
</div>


@endsection
