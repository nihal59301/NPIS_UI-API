@extends('layouts.app')
@push('scripts')
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/css/style.css" />
<link rel="stylesheet" href="assets/css/Mediaquery.css" />
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
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
 $site_key="6Lfto-8iAAAAAH_Z0bck7F3XtBBvPN6-Jbj44rib";
 $secret_key="6Lfto-8iAAAAAE_EqMEmYoBf-dyXWGfknA7b254N";  
@endphp
{{-- <div class="container">
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
</div> --}}

    <section>
      <!-- Button trigger modal -->
      <div class="login_container">
        <button
          type="button"
          class="btn btn-primary login_btn"
          data-toggle="modal"
          data-target="#log_masuk_modal"
        >
          LOGIN
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="log_masuk_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered log_masuk_modal_dialog" role="document">
          <div class="modal-content log_masuk_modal_container">
                <div class="log_masuk_modal_content">
                    <div class="log_masuk_modal_header d-flex">
                        <button type="button" data-dismiss="modal" class="ml-auto">
                            <img src="assets/images/image 95.png" alt="" />
                        </button>
                    </div>
                <!-- PENGGUNA JPS -->
                    <div class="modal-body log_masuk_modal_body">
                        <h4>log masuk</h4>
                    <div class="MAsuk_tab_container pt-3">
                  <nav class="">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button
                        class="nav-link active"
                        id="nav-home-tab"
                        data-toggle="tab"
                        data-target="#nav-home"
                        type="button"
                        role="tab"
                        aria-controls="nav-home"
                        aria-selected="true"
                      >
                        Pengguna JPS
                      </button>
                      <button
                        class="nav-link1"
                        id="nav-profile-tab"
                        data-toggle="tab"
                        data-target="#nav-profile"
                        type="button"
                        role="tab"
                        aria-controls="nav-profile"
                        aria-selected="false"
                      >
                        pengguna kementerian/agensi
                      </button>
                    </div>
                  </nav>
                  <div class="tab-content pengguna_jps_tab_content"
                       id="nav-tabContent">
                      <div class="tab-pane fade show active"
                           id="nav-home"
                           role="tabpanel"
                           aria-labelledby="nav-home-tab">
                          <p class="info">
                              Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                          </p>
                          <form id="pengguna_jps_form" method="POST" action="{{url('login')}}">
                            @csrf    
                              <div class="form-group">
                                  <label for="email"  class="sr-only">kad pengenalan</label>
                                  <input type="text"
                                         class="form-control"
                                         id="email"
                                         aria-describedby="emailHelp"
                                         placeholder="Kad Pengenalan" name="email" />
                                         @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                              </div>
                              <div class="form-group position-relative">
                                  <label for="password" class="sr-only">Kata Laluan</label>
                                  <input type="password"
                                         class="form-control password_eye_field"
                                         id="password"
                                         placeholder="Kata Laluan" name="password" />
                                         
                                  <button class="eye_icon">
                                      <img src="assets/images/Password eye.png" alt="" />
                                  </button>
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                              <div class="g-recaptcha" data-sitekey={{$site_key}} data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                              {{-- <button id="login" type="button" value="" class="btn btn-block masuk_submit mt-4" disabled>log masuk</button> --}}
                              <div class="row mb-0">
                                <div class="col-md-12">
                                    <button id="login" type="submit"  class="btn btn-primary masuk_submit" disabled>
                                        {{ __('Log Masuk') }}
                                    </button>
                                </div> 
                                <div class="forget_password d-ext-end">
                                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Laluan?') }}
                                    </a>
                                  @endif 
                                    <a class="btn btn-link" href="RegisterNewUser">
                                        {{ __('Daftar Baharu') }}
                                    </a>
                                </div>
                            </div>
                          </form>
                      </div>
                      <!-- PENGGUNA Kementerian/Agensi -->
                      <div class="tab-pane fade"
                           id="nav-profile"
                           role="tabpanel"
                           aria-labelledby="nav-profile-tab">
                           <div class="tab-content pengguna_jps_tab_content"
                           id="nav-tabContent">
                          <div class="tab-pane fade show active"
                               id="nav-home"
                               role="tabpanel"
                               aria-labelledby="nav-home-tab">
                              <p class="info">
                                  Sila masukkan ID Pengguna, Kata Laluan, dan Captcha
                              </p>
                              <form id="pengguna_jps_form" method="POST" action="{{url('login')}}">
                                @csrf    
                                  <div class="form-group">
                                      <label for="nonjps_useremail"  class="sr-only">kad pengenalan</label>
                                      <input type="text"
                                             class="form-control"
                                             id="nonjps_useremail"
                                             aria-describedby="emailHelp"
                                             placeholder="Kad Pengenalan" name="nonjps_useremail" />
                                             @error('nonjps_useremail')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                  </div>
                                  <div class="form-group position-relative">
                                      <label for="exampleInputPassword1" class="sr-only">Kata Laluan</label>
                                      <input type="password"
                                             class="form-control password_eye_field"
                                             id="nonjps_userpassword"
                                             placeholder="Kata Laluan" name="nonjps_userpassword" />
                                      <button class="eye_icon">
                                          <img src="assets/images/Password eye.png" alt="" />
                                      </button>
                                      @error('nonjps_userpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="g-recaptcha" data-sitekey={{$site_key}} data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                                  {{-- <button id="login" type="button" value="" class="btn btn-block masuk_submit mt-4" disabled>log masuk</button> --}}
                                  <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button id="login" type="submit"  class="btn btn-primary masuk_submit" disabled>
                                            {{ __('Log Masuk') }}
                                        </button>
                                    </div>
                                    <div class="forget_password d-text-end">
                                      @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Lupa Kata Laluan?') }}
                                        </a>
                                      @endif
                                      <a class="btn btn-link" href="RegisterNewUser">
                                        {{ __('Daftar Baharu') }}
                                    </a>
                                  </div>
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
      </div>
    </section>
    <section>
      <div class="forget_modal">
        <!-- Modal -->
        <div
          class="modal fade"
          id="Forget_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered forget_modal_dialog"
            role="document"
          >
            <div class="modal-content forget_modal_content">
              <div class="modal-body forget_modal_body">
                <div class="forget_modal_heading">
                  <h4>Lupa kata laluan ?</h4>
                  <p>
                    Sila masukkan E-Mel, No. Kad Pengenalan dan semak E-Mel anda
                    untuk set semula kata laluan.
                  </p>
                </div>
                <div class="forget_modal_form">
                  <form id="forget_modal_form" autocomplete="off">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="sr-only"
                        >No. Kad Pengenalan</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="No. Kad Pengenalan"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="sr-only"
                        >Alamat E-Mel</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Alamat E-Mel"
                      />
                    </div>
                    <div class="forget_submit text-center">
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#sucess_modal"
                        data-dismiss="modal"
                      >
                        Hantar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="sucess_modal_container">
        <div
          class="modal fade"
          id="sucess_modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered sucess_modal_dialog"
            role="document"
          >
            <div class="modal-content sucess_modal_content">
              <div class="modal-body sucess_modal_body">
                <h3>
                  Kata laluan berjaya dihantar ke <br />
                  email anda
                </h3>
                <div class="text-center">
                  <button data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <div class="sucess_msg">
                <img src="assets/images/coolicon.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
        let round = document.querySelector(".round");
        let index = document.querySelector("#index");
        let eye_icon = document.querySelector(".eye_icon");
        let password_eye_field = document.querySelector(".password_eye_field");
        let login = document.querySelector("#login");
        if (login) {
        eye_icon.addEventListener("click", (e) => {
            console.log(password_eye_field);
            e.preventDefault();
            password_eye_field.type == "password"
            ? (password_eye_field.type = "text")
            : (password_eye_field.type = "password");
        });
        //   document.querySelector(".musuk_submit").addEventListener("click", (e) => {
        //     e.preventDefault();
        //   });
        }
        if (index) {
        let side_bar_Container = document.querySelector(".side_bar_Container");
        let accordial_all_list = document.querySelectorAll(
            ".accordian_single_list, .NPIS_logo_right_content"
        );
        // --------------------------------------------------------------------------------------------
        let Mainbody_conatiner = document.querySelector(".Mainbody_conatiner");
        round.addEventListener("click", () => {
            side_bar_Container.classList.remove("show");
            Mainbody_conatiner.classList.add("active");
            accordial_all_list.forEach((asl) => {
            asl.classList.add("active");
            });
        });
        // --------------------------------------------------------------------------------------------
        document.querySelector(".NPIS_logo").addEventListener("click", () => {
            side_bar_Container.classList.add("show");
            Mainbody_conatiner.classList.remove("active");
            accordial_all_list.forEach((asl) => {
            asl.classList.remove("active");
            });
        });
        // --------------------------------------------------------------------------------------------

        let accordian_single_list = document.querySelectorAll(
            ".accordian_single_list"
        );
        let d_arrow = document.querySelectorAll(".d_arrow");

        accordian_single_list.forEach((asl) => {
            asl.addEventListener("click", () => {
            d_arrow.forEach((darr) => {
                darr.classList.remove("active");
            });
            // let accordian_content = asl.closest(".accordian_content ");
            // console.log(accordian_content);
            let arrow = asl.querySelector(".d_arrow");
            let Accordian_link = asl.querySelector(".Accordian_link");
            if (Accordian_link.classList.contains("collapsed")) {
                arrow.classList.add("active");
            } else {
                arrow.classList.remove("active");
            }
            });
        });
        }
        </script>

            
        <script>
        // $("#log_musuk_modal").modal("show");
        // $("#Forget_modal").modal("show");
        // $("#sucess_modal").modal("show");
        function onSubmit(token) {
        document.getElementById("penguna_jps_form").submit();
        }
        </script>

            <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Le_V_siAAAAAI7AEeMNmqhYrC5deixFB63Kmhmb"></script> -->
        </body>

@endsection

