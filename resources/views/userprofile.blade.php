
@extends('layouts.master')

@section('content')
<style>
.close{
    text-align: end !important;
}
</style>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right" style="font-size:10px;">
                                <a href="javascript: void(0);">
                                       <i class="mdi mdi-earth" style="font-style:normal">Geo-board ></i>
                                 </a>
                                 <a href="javascript: void(0);" style="font-style:normal">
                                       Pentadbir >
                                 </a>
                                       Profil Pengguna 
                        </div>
                        <h4 class="page-title">Profil Pengguna</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 justify-content-center">
                    <div class="card text-center p-5">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                        <div class="rounded-circle">
                            <img src="" id="gambar_image" class="border w-25 align-self-center rounded-circle" alt="...">
                        </div>
                        <h5>
                            <label id="nama"></label>
                            <br>
                            <label id="user_data_type"></label>
                        </h5>  
                        <button class="btn btn-success col-lg-6 col-md-3 mb-3 align-self-center" id="active">
                           <label> Aktif </label>
                        </button>
                        <button class="btn btn-danger col-lg-6 col-md-3 mb-3 align-self-center" id="inactive">
                           <label> Tidak Aktif </label>
                        </button>
                           
                        <label>Jurutera Awam</label>   
                        <label>Jabatan Pengairan dan Saliran (JPS)</label>
                        <label>Bahagian Korporat (BKOR)</label>                       
                    </div> <!-- end card-->
                    <div class="card text-center">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <div class="rounded-circle d-flex">
                                    <img src="myfile.png" width="10%" class="border align-self-center rounded-circle">
                                    <label class="header-title align-self-center p-1">PERANAN</label>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm d-flex"><i class="fa-solid fa-plus"></i> Peranan</button>
                            </div>
                        </div>                   
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-xl-8 col-lg-8 justify-content-center">
                    <div class="card card-h-100 p-3">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <div class="rounded-circle d-flex">
                                    <h4 class="header-title align-self-center p-1"> <i class="mdi mdi-account"> </i> PROFIL</h4>
                                </div>
                            </div>
                            <div>
                            <button class="btn btn-sm btn-info"> <i class="mdi mdi-printer" style="font-style:normal"></i></button>
                            </div>
                        </div>
                        <div>
                        <form action="" method="post" id="update_user_form" name="myform">
                        <input type="hidden" id="api_url" value={{env('API_URL')}}>
                        <input type="hidden" id="token" value={{env('TOKEN')}}>
                        <input type="hidden" id="user_type" value="table_users">
                        <input type="hidden" id="user_id" name="id" value="{{$user_id}}">

                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="nama" class="text-primary">Nama</label>
                                <input type="text" class="form-control" id="name" name="nama" placeholder="">
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="no_kod_penganalan" class="text-primary">No. Kad Pengenalan</label>
                                <input type="text" class="form-control" id="no_kod_penganalan" name="no_kod_penganalan" placeholder="">
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="no_telefon" class="text-primary">No. Telefon</label>
                                <input type="text" class="form-control" id="no_telefon" name="no_telefon" placeholder="">
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="emel_rasmi" class="text-primary">Emel Rasmi</label>
                                <input type="text" class="form-control" id="emel_rasmi" name="emel_rasmi" placeholder="">
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="Jabatan" class="text-primary">Jabatan</label>
                                <select id="Jabatan" class="form-control" name="Jabatan">
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="gred" class="text-primary">Gred</label>
                                <select id="gred" class="form-control" name="gred">
                                </select>
                                </div>
                            </div>
                            <!-- <div class="form-group" style="padding-right:15px; margin-bottom:12px;">
                                <label for="kementerian"  class="text-primary">Kementerian</label>
                                <select id="kementerian" class="form-control">
                                </select>
                            </div> -->
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="Jawatan" class="text-primary">Jawatan</label>
                                <select id="Jawatan" class="form-control" name="Jawatan">
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                    <label for="bahagian" class="text-primary">Bahagian</label>
                                    <select id="bahagian" class="form-control" name="bahagian">
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="negeri" class="text-primary">Negeri</label>
                                <select id="negeri" class="form-control" name="negeri">
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="daerah" class="text-primary">Daerah</label>
                                <select id="daerah" class="form-control" name="daerah">
                                </select>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="inputEmail4" class="text-primary">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>                                
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="catatan" class="text-primary">Catatan</label>
                                <textarea class="form-control" rows="5" id="catatan" name="catatan"></textarea>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between" id="doku_sec" style="display:none !important;">
                                <div class="form-group col-md-6" id="profile">
                                    <label  class="text-primary">Dokumen Sokongan</label><br>
                                    <span><a target="blank" href="" id="document_url"><img src="pdf_image.png"width="10%"></a></span>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                </div>
                            </div>
                            <div class=" text-center p-3">
                                <button type="button" class="back btn btn-danger">Kembali</button>
                                <button type="button" class="save btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div> <!-- end card-->
                </div>
            <!-- end row -->
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="card  mb-0">
                <button type="button" class="close border-0 bg-white text-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <div class="modal-body text-center" id="user_pop-up" style="display:none;">
                        Maklumat anda berjaya disimpan
                        <div class="p-1">
                            <button class="btn btn-primary btn-sm col-2 close">Tutup</button>
                        </div>
                    </div>
                    <div class="modal-body text-center" id="tmp_user_pop-up" style="display:none;">
                        pengesahan pengguna telah bergaja
                        <div class="p-1">
                            <button class="btn btn-primary btn-sm col-2 close">Tutup</button>
                        </div>
                    </div>
                <div>
                </div>               
            </div> <!-- end card-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
	const api_url = document.getElementById("api_url").value;  console.log(api_url);
    const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);

	$('#show-me').hide();   
	$('input[type="radio"]').click(function() { //alert($(this).attr('id'));
		if($(this).attr('id') == 'agensi_luar') {
			 $('#show-me').show();           
		}
 
		else {
			 $('#show-me').hide();   
		}
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

	var JabatandropDown =  document.getElementById("Jabatan");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/jabatan/list/",
        dataType: 'json',
        success: function (result) { 
            console.log(result.data)
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

	var negeridropDown =  document.getElementById("negeri");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/negeri/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_negeri;
					el.value = opt;
					negeridropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });

	var daerahdropDown =  document.getElementById("daerah");
    $.ajax({
        type: "GET",
        url: api_url+"api/lookup/daerah/list",
        dataType: 'json',
        success: function (result) { console.log(result)
            if (result) {
                $.each(result.data, function (key, item) {
					var opt = item.id;
					var el = document.createElement("option");
					el.textContent = item.nama_daerah;
					el.value = opt;
					daerahdropDown.appendChild(el);
                })
            }
            else {
                $.Notification.error(result.Message);
            }
        }
    });
    var jawatandropDown =  document.getElementById("Jawatan");
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

    

    var tmp_user =  localStorage.getItem('user_type'); console.log("{{$temp_type}}");
     var user_id =  localStorage.getItem('user_id'); console.log({{$user_id}});
     var tmp_user = "{{$temp_type}}"
    
    var list_user_api='';
    var update_user_api='';
    var data_update='';
    if(tmp_user!='temp')
    {
         list_user_api = api_url+"api/user/details/"+{{$user_id}};
         update_user_api = api_url+"updateUser/";
         data_update = $('#update_user_form').serialize();
    }
    else
    {
        list_user_api = api_url+"api/user/details/temp/"+{{$user_id}};
        update_user_api = api_url+"api/user/approval/";
        data_update = {'id':user_id};

    }
    var jsonString = JSON.stringify(data_update);
    console.log(list_user_api)
   //console.log(jsonString);
    $.ajax({
        type: "GET",
        url: list_user_api,
        dataType: 'json',
        success: function (result) { console.log(result.data)
            if (result.data) { //console.log(document.getElementById("nama").innerHTML);
                document.getElementById("name").value= result.data.user.name;
                // document.getElementById("nama").innerHTML= result.data.user.name;
                document.getElementById("no_telefon").value= result.data.user.no_telefon;
                document.getElementById("emel_rasmi").value= result.data.user.email;
                document.getElementById("jawatan").value= result.data.user.jawatan_id;
                document.getElementById("gred").value= result.data.user.gred_jawatan_id;
                //document.getElementById("kementerian").value= result.data.kementerian_id;
                document.getElementById("Jabatan").value= result.data.user.jabatan_id;
                document.getElementById("bahagian").value= result.data.user.bahagian_id;
                document.getElementById("negeri").value= result.data.user.negeri_id;
                document.getElementById("daerah").value= result.data.user.daerah_id;
                document.getElementById("catatan").value= result.data.user.catatan;
                document.getElementById("no_kod_penganalan").value= result.data.user.no_ic;

                if(result.data.user.status_pengguna_id==1 && result.data.user.row_status==1)
                {
                    document.getElementById("inputState").value= 1;
                    document.getElementById("active").style.display = 'block';
                    document.getElementById("inactive").style.display = 'none';
                }
                else
                {
                    document.getElementById("inputState").value= 0;
                    document.getElementById("inactive").style.display = 'block';
                    document.getElementById("active").style.display = 'none';
                }
                document.getElementById("gambar_image").src = api_url+result.data.user.gambar_profil;
                if(result.data.dokumen_sokungan && result.data.jenis_pengguna_id==0)
                {
                    document.getElementById("doku_sec").style.display = 'block';
                    document.getElementById("document_url").href = result.data.user.dokumen_path;
                    document.getElementById("user_data_type").innerHTML = "Pengguna Agensi Luar";
                }
                 else 
                { 
                    document.getElementById("doku_sec").style.display = 'none !important';
                    document.getElementById("user_data_type").innerHTML = "Pentadbir";
                }

            }
            else {

            }
        }
    });

    $('.save').click(function(){ console.log(data_update);
        $.ajax({
            type: 'POST',
            url: update_user_api,
            data: jsonString, 
            success: function(response) { console.log(response.code)
                if(response.code=='200'){
                    $("#exampleModalCenter").modal('show');
                    if(tmp_user=='table_users')
                    {
                        document.getElementById("user_pop-up").style.display = 'block';
                        document.getElementById("tmp_user_pop-up").style.display = 'none';
                    }
                    else
                    {
                        document.getElementById("user_pop-up").style.display = 'none';
                        document.getElementById("tmp_user_pop-up").style.display = 'block';
                    }
                }
            }
        });
    });
    $('.close').click(function(){
        $("#exampleModalCenter").modal('hide');
        if(tmp_user!='table_users')
        {
             window.location.href = "{{ url('/pengasahan-pengguna-baharu')}}";
        }
        else
        {
            window.location.href = "{{ url('/users')}}";
        }
    });
});
</script>
@endsection


