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
        $("#login-jps").prop('disabled', false);                             
        $("#login-nonjps").prop('disabled', false);  
    }
          
    }


    $('#Pengguna_JPS').click(function(){
      $('#nonjps_doc').hide();
    })
    $('#Agensi_Luar').click(function(){
      $('#nonjps_doc').show();
    })

    
</script>

   
<script>
let round = document.querySelector(".round");
let index = document.querySelector("#index");
let eye_icon = document.querySelector(".eye_icon");
let password_eye_field = document.querySelector(".password_eye_field");
let login = document.querySelector("#login");
let interface_tab_content = document.querySelectorAll(".interface_tab_content");
let r_input = document.querySelectorAll(".r_container input");
let input_file = document.querySelector("#Dokumen_Sokongan");
let input_file_btn = document.querySelector(".form_input_file .select_file");
let userlist_tab_btn = document.querySelectorAll(
  ".userlist_tab_btn_container button"
);
let userlist_tab_content = document.querySelectorAll(".userlist_tab_content ");

// ----------------------------------------user_profile-------------------------------------------
let user_profile = document.querySelector("#user_profile");
if (user_profile) {
  userlist_tab_btn.forEach((utb, i) => {
    utb.addEventListener("click", () => {
      userlist_tab_content.forEach((utc) => {
        utc.classList.add("d-none");
      });
      userlist_tab_btn.forEach((utb) => {
        utb.classList.remove("active");
      });
      utb.classList.add("active");
      userlist_tab_content[i].classList.remove("d-none");
    });
  });
  userlist_tab_btn[1].click();
}
if (login) {
  eye_icon.addEventListener("click", (e) => {
    console.log(password_eye_field);
    e.preventDefault();
    password_eye_field.type == "password"
      ? (password_eye_field.type = "text")
      : (password_eye_field.type = "password");
  });
  document.querySelector(".masuk_submit").addEventListener("click", (e) => {
    e.preventDefault();
  });
  r_input.forEach((inp, i) => {
    inp.addEventListener("click", () => {
      interface_tab_content.forEach((itc) => {
        itc.classList.add("d-none");
      });
      if (inp.checked == true) {
        interface_tab_content[i].classList.remove("d-none");
      }
    });
  });
  r_input[1].click();

  // input_file
  input_file_btn.addEventListener("click", (e) => {
    e.preventDefault();
    console.log(input_file);
    input_file.click();
  });

  // -------------------------
  input_file.addEventListener("change", () => {
    var files = input_file.files;
    if (FileReader && files && files.length) {
      var fr = new FileReader();
      // console.log(fr);

      fr.onload = function () {
        file=input_file.files.length;
        file_name=input_file.files[0].name;
        file_size=input_file.files[0].size;
        file_type=input_file.files[0].type;
        pdf_size=file_size/1000024;
        console.log(file_type);
        if(file_type=='application/pdf'){
          $("#pdf_name").html(file_name);
          if(pdf_size>10){
            $("#err-msg").prop('d-block');
            $("#pdf_remove").prop('d-block');
          }
          else{
            $("#pdf_size").html(pdf_size+'MB');
          }
        }
        else{
          alert('Please use a pdf file');
        }

      };

      fr.readAsDataURL(files[0]);
    }
  });
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
$(document).ready(function() {
  const api_url = document.getElementById("api_url").value;  console.log(api_url);
	const app_url = document.getElementById("app_url").value;  console.log(app_url);
  const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);
      $('#subForgotButton').click(function(){
        // var formData = new FormData();
        // var name = $("#email").val();
        // console.log(name)
        // //formData.append('email', document.submitForgot.email.value);
        // axios({
        // 	method: "post",
        // 	url: api_url+"forgot-password",
        // 	data: formData,
        // 	headers: { "Content-Type": "application/json","Authorization": api_token },
        // })
        // .then(function (response) {
        // 	//handle success
        // 	console.log(response.data.code);				
        // 	})
        // 	.catch(function (response) {
        // 		//handle error
        // 		console.log(response);
        // 		alert("There was an error submitting data");
        // 	});
      console.log('modal submitted')
      //$('#sucess_modal').modal('show');
        $('#submitForgot').submit();
    });

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });
	// var dropDown = document.getElementById("kementerian");
    // $.ajax({
    //     type: "GET",
    //     url: api_url+"GetKementerian/",
    //     dataType: 'json',
    //     success: function (result) { console.log(result)
    //         if (result) {
    //             $.each(result, function (key, item) {
	// 				var opt = item.id;
	// 				var el = document.createElement("option");
	// 				el.textContent = item.Name;
	// 				el.value = opt;
	// 				dropDown.appendChild(el);
    //             })
    //         }
    //         else {
    //             $.Notification.error(result.Message);
    //         }
    //     }
    // });

	var JabatandropDown =  document.getElementById("jabatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jabatan/list/",
        dataType: 'json',
        success: function (result) { console.log(result.data)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jabatan;
					el.value = opt;
					JabatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    var bahagiandropDown =  document.getElementById("bahagian");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/bahagian/list/",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_bahagian;
					el.value = opt;
					bahagiandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    var jawatandropDown =  document.getElementById("jawatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_jawatan;
					el.value = opt;
					jawatandropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var greddropDown =  document.getElementById("gred");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/gredjawatan/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_gred_jawatan;
					el.value = opt;
					greddropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

    

})



  </script>
@endpush
@section('content')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@php
$site_key= config('services.googleCaptcha.site_key');
 $secret_key=config('services.googleCaptcha.secret_key');
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
      @if($errors->any())
          {{ implode('', $errors->all('<div>:message</div>')) }}
      @endif
        <button
          type="button"
          class="btn btn-primary login_btn"
          data-toggle="modal"
          data-target="#log_masuk_modal"
        >
          LOGIN
        </button>
      </div>
      <input type="hidden" id="token" value={{env('TOKEN')}}>
      <input type="hidden" id="api_url" value={{env('API_URL')}}>
      <input type="hidden" id="app_url" value={{env('APP_URL')}}>
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
                              
                              <div class="row mb-0">
                                <div class="col-md-12">
                                    <button id="login-jps" type="submit" class="btn btn-primary masuk_submit" disabled>
                                        {{ __('Log Masuk') }}
                                    </button>
                                </div> 
                                <div class="forget_password d-ext-end">
                                  <a class="btn btn-link" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                                  data-keyboard="false">
                                      {{ __('Daftar Baharu') }}
                                  </a>
                                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="#"  data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                                    data-keyboard="false">
                                        {{ __('Lupa Kata Laluan?') }}
                                    </a>
                                  @endif 
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
                              <form id="pengguna_nonjps_form" method="POST" action="{{url('login')}}">
                                @csrf    
                                  <div class="form-group">
                                      <label for="nonjps_useremail"  class="sr-only">E-mel</label>
                                      <input type="text"
                                             class="form-control"
                                             id="nonjps_useremail"
                                             aria-describedby="emailHelp"
                                             placeholder="E-mel" name="email" />
                                             @error('email')
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
                                        <button id="login-nonjps" type="submit"  class="btn btn-primary masuk_submit" disabled>
                                            {{ __('Log Masuk') }}
                                        </button>
                                    </div>
                                    <div class="forget_password d-text-end">
                                      <a class="btn btn-link" href="#"  data-target="#Login_interface_modal" data-toggle="modal" data-backdrop="static"
                                      data-keyboard="false">
                                        {{ __('Daftar Baharu') }}
                                      </a>
                                      @if (Route::has('password.request'))
                                        <a class="btn btn-link" data-target="#Forget_modal" data-toggle="modal" data-backdrop="static"
                                        data-keyboard="false">
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
            </div>
          </div>
        </div>
      </div>
    </section>
      <!---------------------------------------------------- login interface Modal starts-------------------------- -->
      <section>
        <div class="login_interface_section">
          <div
            class="modal fade"
            id="Login_interface_modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered login_interface_modal_dialog"
              role="document"
            >
              <div class="modal-content login_interface_modal_content">
                <div class="modal-body login_interface_modal_body">
                  <div class="login_interface_close">
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <img src="assets/images/image 95.png" alt="" />
                    </button>
                  </div>
                  <div class="login_interface_modal_body_content">
                    <h4 class="login_interface_modal_header">
                      DAFTAR AKAUN BAHARU
                    </h4>
                    <div class="interface_tab_container">
                      <div class="d-flex">
                        <div class="label">
                          <label for="Kotegori Pengguna">Kotegori Pengguna</label>
                        </div>
                        <div class="radio_Container d-flex flex-column ml-5">
                          <label class="r_container"
                            >Pengguna JPS
                            <input type="radio" name="radio" id="Pengguna_JPS" />
                            <span class="checkmark"></span>
                          </label>
                          <label class="r_container"
                            >Agensi Luar
                            <input
                              type="radio"
                              name="radio"
                              id="Agensi_Luar"
                              checked
                            />
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="interface_tab_content_container">
                      <div class="interface_tab_content">

                      </div>
                      <div class="interface_tab_content">
                        <form class="login_interface_modal_form" action="" method="post" id="register_agensi_user_form" name="myform">
                          <div class="input_container">
                            <label
                              for="Nama_Penuh"
                              class="col-form-label form_label"
                              >Nama Penuh</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="name" name="nama"
                              />
                            </div>
                            <span class="error" id="error_name"></span>
                          </div>
  
                          <div class="input_container">
                            <label
                              for="Kad_Pengenalan"
                              class="col-form-label form_label"
                              >No. Kad Pengenalan</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Kad_Pengenalan" name="no_kod_penganalan"
                              />
                            </div>
                            <span class="error" id="error_no_kod_penganalan"></span>
                          </div>
                          <div class="input_container">
                            <label
                              for="Email_Rasmi"
                              class="col-form-label form_label"
                              >Email Rasmi</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="Email_Rasmi" name="email"
                              />
                            </div>
                            <span class="error" id="error_email"></span>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >No Telefon</label
                            >
                            <div class="form_input">
                              <input
                                type="text"
                                class="form-control"
                                id="No_Telefon" name="no_telefon"
                              />
                            </div>
                            <span class="error" id="error_telefon"></span>
                          </div>
                          <div class="input_container">
                            <label
                              for="No_Telefon"
                              class="col-form-label form_label"
                              >Jawatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="jawatan" name="jawatan"
                              >
                                <option value=""></option>
                              </select>
                              <span class="error" id="error_jawatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Gred" class="col-form-label form_label">Gred</label>
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="gred" id="gred"
                              >
                                <option value=""></option>
                              </select>
                              <span class="error" id="error_gred"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kementerian"
                              class="col-form-label form_label"
                              >Kementerian</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                id="Kementerian"
                              >
                                <option value="1">Kementerian Alam Sekitar dan Air (KASA)</option>
                                <option value="2">Kementerian Tenaga dan Sumber Asli (KeTSA)</option>
                              </select>
                            </div>
                          </div>
                          <div class="input_container">
                            <label for="Jabatan" class="col-form-label form_label"
                              >Jabatan</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="jabatan" id="jabatan"
                              >
                                <option value=""></option>
                              </select>
                              <span class="error" id="error_jabatan"></span>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Bahagian"
                              class="col-form-label form_label"
                              >Bahagian</label
                            >
                            <div class="form_input">
                              <select
                                type="text"
                                class="form-control"
                                name="bahagian" id="bahagian"
                              >
                                <option value=""></option>
                              </select>
                              <span class="error" id="error_bahagian"></span>                                   
                            </div>
                          </div>
                          <div class="input_container" id='nonjps_doc'>
                            <div class="file_label d-flex">
                              <label
                                for="Dokumen_Sokongan"
                                class="col-form-label form_label"
                                >Dokumen Sokongan</label
                              >
                              <div class="pop_btn">
                                <button
                                  type="button"
                                  class="btn"
                                  data-container="body"
                                  data-toggle="popover"
                                  data-placement="right"
                                  data-content="Sila muat naik  kad Jabatan"
                                >
                                  <img src="assets/images/i-icon.png" alt="" />
                                </button>
  
                                <!-- <div class="pop_over">
                                <p>  </p>
                                </div> -->
                              </div>
                            </div>
  
                            <div  class="form_input_file">
                              <input
                                type="file"
                                class="form-control"
                                id="Dokumen_Sokongan"
                              />
                              <button class="select_file">
                                Muat naik lampiran
                              </button>
                              <p id="err-msg" class="file_size d-none">
                                (Salz fail tidak melebihi 10 mb)
                              </p>
                              <div class="selected_file d-flex">
                                <div id="pdf_img" class="pdf_img">
                                </div>
                                <div class="file_details">
                                  <p id="pdf_name" class="pdf_name"></p>
                                  <button class="d-none" id="pdf_remove">Remove file</button>
                                </div>
                                <p id="pdf_size" class="pdf_size"></p>
                              </div>
                            </div>
                          </div>
                          <div class="input_container">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Kod Pengesahan</label
                            >
                            <div class="form_input">
                              <div
                                class="g-recaptcha"
                                data-sitekey={{$site_key}}
                                data-action="submit"
                              >
                                Submit
                              </div>
                            </div>
                          </div>
                          <div class="input_container m-0">
                            <label
                              for="Kod_Pengesahan"
                              class="col-form-label form_label"
                            >
                              Perakuan Pendaftaran</label
                            >
                            <div class="form_input">
                              <div class="form-group form-check form_checker">
                                <input
                                  type="checkbox"
                                  class="form-check-input"
                                  id="exampleCheck1"
                                />
                                <label class="form_check_label" for="exampleCheck1"
                                  >Dengan ini saya MENGAKU bahawa semua maklumat
                                  yang diisikan dalam permohonan ini adalah SAHIH
                                  dan BENAR.</label
                                >
                              </div>
                            </div>
                          </div>
                          <div class="form_btn_container">
                            <button>KEMBALI</button><button id="submit_agensi">DAFTAR</button>
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
      </section>
      {{--------------------------------- Forget pass model for JPS USER ---------------------------------------------}}
    <section>
      <div class="forget_modal">
        <!-- Modal -->
        <form method="POST" action="{{ route('password.email') }}" id="submitForgot">
            @csrf
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
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="sr-only"
                        >No. Kad Pengenalan</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        name="no_ic"
                        aria-describedby="emailHelp"
                        placeholder="No. Kad Pengenalan"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="sr-only"
                        >Alamat E-Mel</label
                      >
                      <input
                        type="email" name="email"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Alamat E-Mel"
                      />
                    </div>
                    <div class="forget_submit text-center">
                      <button
                        type="submit"   
                        id="subForgotButton"                     
                        data-toggle="modal"
                        data-target="#sucess_modal"
                        data-dismiss="modal"
                      >                      
                        Hantar
                      </button>
                    </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
</form>
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
 
            <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Le_V_siAAAAAI7AEeMNmqhYrC5deixFB63Kmhmb"></script> -->
</body>

@endsection

