@extends('layouts.auth')


@push('addon-style')
    <style>
       
    </style>
@endpush

@section('content')
<div class="row login-page" id="register">
    <div class="col-lg-5 col-md-12 mt-3" data-aos="fade-right">
        <img src="/images/ineke/WhatsApp Image 2021-04-01 at 7.04.31 AM.jpeg" class="w-100" alt="">
    </div>
    <div class="col-md-7 col-12 d-flex flex-column align-items-center" data-aos="fade-right">
        <h1 >Make  your account.</h1>
        <div class="card border-0 p-3">
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
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" @change="checkForEmailAvailbility()" :class="{'is_invalid' : this.email_unavailable}" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                <div class="mb-3">
                    <label for="">Store</label>
                    <p class="text-muted">Apakah anda ingin mendaftarkan jasa MUA anda ? </p>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="is_store_open" id="openStoreTrue" class="custom-control-input"
                            v-model="is_store_open" :value="true">
                        <label for="openStoreTrue" class="custom-control-label">
                            Iya, boleh
                        </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="is_store_open" id="openStoreFalse"
                            class="custom-control-input" v-model="is_store_open" :value="false">
                        <label for="openStoreFalse" class="custom-control-label">
                            Enggak, makasih
                        </label>
                    </div>
                </div>
                <div class="mb-3 " v-if="is_store_open">
                    <label for="mua_name" class="form-label">Nama MUA</label>
                    <input id="mua_name" type="text" class="form-control @error('mua_name') is-invalid @enderror" name="mua_name" value="{{ old('mua_name') }}" required autocomplete="mua_name" autofocus>

                    @error('mua_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-login w-100" :disabled="this.email_unavailable">Register</button>
            </form>
            <a href="{{route('login')}}" class="btn btn-register mt-2">Login</a>
        </div>
    </div>
</div>


@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted)
    var register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();
        },
        methods: {
            checkForEmailAvailbility: function() {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                            params: {
                                email: this.email
                            }
                        })
                    .then(function (response) {

                        if (response.data == 'Available') {

                            self.$toasted.show(
                                "Email anda tersedia", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000
                                }
                            );

                            self.email_unavailable = false;
                        } else {

                            self.$toasted.error(
                                "Email sudah terdaftar!", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response);
                    })
            }
        },
        data(){
        return{
                name: "Giwang Dwi K",
                email: "gidwn@gmail.com",
                password:"",
                is_store_open: true,
                mua_name: "",
                email_unavailable: false
            }}
    });
</script>
@endpush
