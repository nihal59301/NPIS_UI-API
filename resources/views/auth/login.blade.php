@extends('layouts.app')
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src={{"assets/js/jquery.min.js"}}></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
<script>

var onReturnCallback = function(response) {        
    if(response){
        $("#login").prop('disabled', false);                     
    }
          
    }
</script>
<script type="text/javascript">
    $('#reload').click(function () {        
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                console.log(data)
                $(".captchaimg span").html(data.captcha);
            }
        });
    });
</script>
@endpush
@section('content')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@php
 $site_key="6Lf15AIjAAAAAKxm4CT0LqHFV7E953ubT27lGPOb";
 $secret_key="6Lf15AIjAAAAACSnuR1tzEqSUPTAES27KJptXmro";  
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('login')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('No Kad Pengenalan') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Laluan') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <div class="g-recaptcha" data-sitekey={{$site_key}} data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="Captchaimg" class="col-md-4 col-form-label text-md-end">{{ __('Captcha') }}</label>

                            <div class="col-md-6 captchaimg">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                                </button>                                                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Captcha" class="col-md-4 col-form-label text-md-end">{{ __('Sila masukan captcha diatas') }}</label>

                            <div class="col-md-6">
                                <input id="Captcha" type="tetx" class="form-control @error('Captcha') is-invalid @enderror" name="Captcha" value="{{ old('Captcha') }}" required autocomplete="Captcha" autofocus>

                                @error('Captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         -->

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="login" type="submit" class="btn btn-primary" disabled>
                                    {{ __('Log Masuk') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Laluan?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
