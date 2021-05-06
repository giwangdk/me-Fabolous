@extends('layouts.auth')

@section('content')
<div class="row login-page">
    <div class="col-lg-5 col-md-12" data-aos="fade-right" >
        <img src="/images/image (3).jpg" class="w-100" alt="">
    </div>
    <div class="col-md-7 col-12 d-flex flex-column align-items-center" data-aos="fade-right" >
        <h1 >Authorize <br> your beauty.</h1>
        <div class="card border-0 p-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 ">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <button type="submit"  class="btn btn-login w-100">Login</button>
            </form>
            <a href="{{route('register')}}" class="btn btn-register mt-2">Register</a>
        </div>
    </div>
</div>
@endsection
