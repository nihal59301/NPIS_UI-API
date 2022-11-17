@extends('layouts.master')
   @section('content')
   <?php header('Access-Control-Allow-Origin: *'); ?>

      <div class="content-page ScrollStyle">
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
                                       Daftar Pengguna Bhaharu 
                           </div>
                           <h4 class="page-title">Daftar Pengguna Bhaharu</h4>
                     </div>
                  </div>
                  <form action="" method="post" id="create_user_form" name="myform">
                     <input type="hidden" id="api_url" value={{env('API_URL')}}>
                     <input type="hidden" id="app_url" value={{env('APP_URL')}}>
                     <input type="hidden" id="token" value={{env('TOKEN')}}>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12">
                                <div class="card card-h-100">
                                    <div class="d-flex card-header justify-content-between align-items-center">
                                        <h6><i class="mdi mdi-account-plus"> </i>  DAFTAR BAHARU</h6>
                                          <!-- <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-printer" style="font-style:normal"></i>
                                          </a>                                    -->
                                    </div>
                                    <div class="card-body pt-0">

                                    <div class="kategori">
                                          <label style="padding-bottom:10px;">Kategori Pengguna </label><br>
                                          <input type="radio" id="pengguna_jps" name="kategori" value="1" checked>
                                          <label class="diff-category" for="pengguna_jps"><b>Pengguna JPS</b></label><br>
                                          <input type="radio" id="agensi_luar" name="kategori" value="2">
                                          <label class="diff-category" for="agensi_luar"><b>Agensi Luar</b></label>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Nama</label><br>
                                        <input class="form-control" type="text" name="nama" id="name">
                                        <span class="error" id="error_nama"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>No. Kad Pengenalan</label><br>
                                        <input class="form-control" type="text" name="no_kod_penganalan" id="no_kod_penganalan"> 
                                        <span class="error" id="error_no_kod_penganalan"></span>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Emel Rasmi</label><br>
                                        <input class="form-control" type="email" name="email" id="emel_rasmi">
                                        <span class="error" id="error_email"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>No. Telefon</label><br>
                                        <input class="form-control" type="text" name="no_telefon" id="no_telefon"> 
                                        <span class="error" id="error_no_telefon"></span>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jawatan</label><br>
                                          <select class="form-select" name="jawatan" id="jawatan">
                                          </select>
                                          <span class="error" id="error_jawatan"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Gred</label><br>
                                          <select class="form-select" name="gred" id="gred">
                                          </select>
                                          <span class="error" id="error_gred"></span>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-12">
                                        <label>Kementerian</label><br>
                                        <select class="form-select form-control-light" name="kementerian" id="kementerian">
                                        <option value="1">Kementerian Alam Sekitar dan Air (KASA)</option>
                                        <option value="2">Kementerian Tenaga dan Sumber Asli (KeTSA)</option>
                                        </select>
                                        <span class="error" id="error_kementerian"></span>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jabatan</label><br>
                                          <select class="form-select form-control-light" name="jabatan" id="Jabatan">
                                          </select>
                                          <span class="error" id="error_jabatan"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Bahagian</label><br>
                                        <select class="form-select" name="bahagian" id="bahagian">
                                          <option value=""> - Tidak Berkenaan - </option>
                                          </select>    
                                          <span class="error" id="error_bahagian"></span>                                   
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Negeri</label><br>
                                          <select class="form-select" name="negeri" id="negeri">
                                             <option value=""> - Tidak Berkenaan - </option>
                                          </select>
                                          <span class="error" id="error_negeri"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Daerah</label><br>
                                          <select class="form-select" name="daerah" id="daerah">
                                             <option value=""> - Tidak Berkenaan - </option>
                                          </select>       
                                          <span class="error" id="error_daerah"></span>                               
                                       </div>
                                    </div>
                                    <div class="row input-data">

                                       <div class="col-md-6">
                                          <label>Gambar Profil <h7 class="types">(jenis fail yang disyorkan: jpeg, png)</h7></label><br>
                                          <div class="drop-zone">
                                             <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Letakkan fail di sini atau klik untuk memuat naik​<br><h6>(saiz fail tidak membiri 2 mb)</h6></b></span>
                                             <input type="file" name="myFile" id="myFile" class="drop-zone__input">
                                          </div>
                                          <span id="error_image_name" style="color:red;"></span>
                                       </div>
                                       <input type="hidden" name="image_path" id="image_path" value="">
                                       <input type="hidden" name="image_name" id="image_name" value="">

                                       <div class="col-md-6" id="show-me">
                                          <label>Dokumen Sokongan  <h7 class="types">(jenis fail yang disyorkan: pdf, jpeg, docx, png)</h7></label><br>
                                          <div class="drop-zone_dokumen">
                                             <img id="doku_image_new" src="pdf_image.png"width="10%" style="display:none;"><label id="doku_label"></label>
                                             <span id="dokumen_span" class="drop-zone__prompt_dockumen"><b><i class="mdi mdi-cloud-upload"></i> <br>Letakkan fail di sini atau klik untuk memuat naik​<br><h6>(saiz fail tidak membiri 2 mb)</h6></b></span>
                                             <input type="file" name="dockumen" id="dokumen" class="drop-zone__input_dokumen">
                                          </div>
                                          <div>
                                       </div>
                                          <span id="error_dokumen_name" style="color:red;"></span>
                                       </div>
                                       <input type="hidden" name="dokumen_path" id="dokumen_path" value="">
                                       <input type="hidden" name="dokumen_name" id="dokumen_name" value="">

                                       <div class="col-md-6">
                                          <label>Catatan</label><br>
                                          <textarea class="form-control"  rows="3" name="catatan"></textarea>
                                          <span class="error" id="error_catatan"></span>                               

                                       </div>
                                    </div><br>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                       <a href="/userlist">
                                          <button type="button" class="btn btn-danger" style="float:right">Kembali</button>
                                       </a>
                                       </div>
                                       <div class="col-md-6">
                                       <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                                       </div>
                                    </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                     </div>
                  </div>
                  </form>
               </div>
            </div>
            <!-- End Content-->
         </div>
      </div>
      <div class="modal fade" id="successModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
               <div class="modal-body">
                     <div class="card  mb-0">
                        <button type="button" class="close border-0 bg-white text-right" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                           <div class="modal-body text-center" id="user_pop-up">
                           Pengguna Baharu Telah Berjaya <br> Didaftarkan! <br>
                                 <button class="btn btn-primary close" id="tutup" style="background-color: #4f4fda;float:none;">Tutup</button>
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
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script>
      document.querySelectorAll(".drop-zone__input").forEach((inputElement) => { console.log('ddsssss');
	const dropZoneElement = inputElement.closest(".drop-zone");

	dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => { 
		var file_type = inputElement.files[0].type; console.log(file_type);
		var file_size = inputElement.files[0].size;  console.log(file_size);

		var allowedExtensions=["image/jpeg", "image/png"];
		
		if(allowedExtensions.indexOf(file_type) == -1)  
        {
			//document.getElementById("error_image_name").style.display = 'block';
			document.getElementById("error_image_name").textContent="Jenis fail tidak sah";
			return false;
		}

		if(file_size>2000000)  
        {
			//document.getElementById("error_image_name").style.display = 'block';
			document.getElementById("error_image_name").textContent="saiz fail tidak membiri 2 mb";
			return false;
		}
		document.getElementById("error_image_name").textContent = '';


		if (inputElement.files.length) {
			updateThumbnail(dropZoneElement, inputElement.files[0]);
		}
	});

	dropZoneElement.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElement.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
			dropZoneElement.classList.remove("drop-zone--over");
		});
	});

	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
		}

		dropZoneElement.classList.remove("drop-zone--over");
	});
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {  console.log(file['name']);

		const currentYear = new Date().getFullYear();
		const currentMonth = new Date().getMonth() + 1;
		const currentDay = new Date().getDate();
		const currentHour = new Date().getHours();
		const currentMinute = new Date().getMinutes();
		const currentSecond = new Date().getSeconds();

      document.getElementById("image_name").value= file['name'];

	  var newFileName = currentYear+"_"+currentMonth+"_"+currentDay+"_"+currentHour+"_"+currentMinute+"_"+currentSecond+"_"+file['name']; console.log(newFileName);
	  var formData = new FormData();
      formData.append("file", file, newFileName);  console.log(formData);

	$.ajax({
        type: "POST",
		url: 'api/gambar-profil-upload',
        dataType: 'json',
		cache: false,
        contentType: false,
        processData: false,
		data: formData,
        success: function (result) { console.log(result)
			document.getElementById("image_path").value= result.uploaded_path;
			document.getElementById("image_name").value= result.image_name;
        }
    });

	let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

	// First time - remove the prompt
	if (dropZoneElement.querySelector(".drop-zone__prompt")) {
		dropZoneElement.querySelector(".drop-zone__prompt").remove();
	}

	// First time - there is no thumbnail element, so lets create it
	if (!thumbnailElement) {
		thumbnailElement = document.createElement("div");
		thumbnailElement.classList.add("drop-zone__thumb");
		dropZoneElement.appendChild(thumbnailElement);
	}

	thumbnailElement.dataset.label = file.name;

	// Show thumbnail for image files
	if (file.type.startsWith("image/")) {
		const reader = new FileReader();

		reader.readAsDataURL(file);
		reader.onload = () => {
			thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
		};
	} else {
		thumbnailElement.style.backgroundImage = null;
	}
}


//image upload - done

// document upload started

document.querySelectorAll(".drop-zone__input_dokumen").forEach((inputElement) => {
	const dropZoneElementDokumen = inputElement.closest(".drop-zone_dokumen");

	dropZoneElementDokumen.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => { 
		var file_type = inputElement.files[0].type; console.log(file_type);
		var file_size = inputElement.files[0].size;  console.log(file_size);

		var allowedExtensions=["application/pdf", "image/jpeg", "image/png", "application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
		
		if(allowedExtensions.indexOf(file_type) == -1)  
        {
			// document.getElementById("error_dokumen_name").style.display = 'block';
			document.getElementById("error_dokumen_name").textContent="Jenis fail tidak sah";
			return false;
		}

		if(file_size>2000000)  
        {
			// document.getElementById("error_dokumen_name").style.display = 'block';
			document.getElementById("error_dokumen_name").textContent="saiz fail tidak membiri 2 mb";
			return false;
		}
		document.getElementById("error_dokumen_name").style.display = '';


		if (inputElement.files.length) {
			updateThumbnaildokumen(dropZoneElementDokumen, inputElement.files[0]);
		}
	});

	dropZoneElementDokumen.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElementDokumen.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElementDokumen.addEventListener(type, (e) => {
			dropZoneElementDokumen.classList.remove("drop-zone--over");
		});
	});

	dropZoneElementDokumen.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElementDokumen, e.dataTransfer.files[0]);
		}

		dropZoneElementDokumen.classList.remove("drop-zone--over");
	});
});


function updateThumbnaildokumen(dropZoneElementDokumen, file) {  console.log(file['name']);

		const currentYear = new Date().getFullYear();
		const currentMonth = new Date().getMonth() + 1;
		const currentDay = new Date().getDate();
		const currentHour = new Date().getHours();
		const currentMinute = new Date().getMinutes();
		const currentSecond = new Date().getSeconds();
      document.getElementById("dokumen_name").value= file['name'];



	  var newFileName = currentYear+"_"+currentMonth+"_"+currentDay+"_"+currentHour+"_"+currentMinute+"_"+currentSecond+"_"+file['name']; console.log(newFileName);
	  var formData = new FormData();
      formData.append("file", file, newFileName);  console.log(formData);

	$.ajax({
        type: "POST",
		url: 'api/dokumen-sokongan',
        dataType: 'json',
		cache: false,
        contentType: false,
        processData: false,
		data: formData,
        success: function (result) { console.log(result)
			document.getElementById("dokumen_path").value= result.dokumen_path;
			document.getElementById("dokumen_name").value= result.dokumen_name;
        }
    });

	let thumbnailElementDokumen = dropZoneElementDokumen.querySelector(".drop-zone__thumb_dokumen");

	// First time - remove the prompt
	if(thumbnailElementDokumen){
		if (thumbnailElementDokumen.querySelector(".drop-zone__prompt_dokumen")) {
			thumbnailElementDokumen.querySelector(".drop-zone__prompt_dokumen").remove();
		}
	}
	console.log('avv');

	document.getElementById("doku_image_new").style.display = 'block';
	document.getElementById("dokumen_span").style.display = 'none';
	document.getElementById("doku_label").innerHTML = file.name;


	// // First time - there is no thumbnail element, so lets create it
	// if (!thumbnailElementDokumen) { 
	// 	thumbnailElementDokumen = document.createElement("div");
	// 	thumbnailElementDokumen.classList.add("drop-zone__thumb_dokumen");
	// 	dropZoneElementDokumen.appendChild(thumbnailElementDokumen);
	// }

	// thumbnailElementDokumen.dataset.label = file.name;

	// Show thumbnail for image files
	// if (file.type.startsWith("image/")) {
	// 	const reader = new FileReader();

	// 	reader.readAsDataURL(file);
	// 	reader.onload = () => {
	// 		thumbnailElementDokumen.style.backgroundImage = `url('${reader.result}')`;
	// 	};
	// } else {
	// 	thumbnailElementDokumen.style.backgroundImage = null;
	// }
}


//document upload - done
$(document).ready(function() {
	const api_url = document.getElementById("api_url").value;  console.log(api_url);
	const app_url = document.getElementById("app_url").value;  console.log(app_url);
    const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);
	const {
		host, hostname, href, origin, pathname, port, protocol, search
	  } = window.location
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


    $("#submit").click(function(){


		if(!document.myform.nama.value)  { 
			document.getElementById("error_nama").innerHTML="medan nama diperlukan"; 
			document.getElementById("name").focus();
			return false; 
		}
		else{
			document.getElementById("error_nama").innerHTML=""; }
		if(!document.myform.no_kod_penganalan.value)  { 
			document.getElementById("error_no_kod_penganalan").innerHTML="medan no kod penganalan diperlukan"; 
			document.getElementById("no_kod_penganalan").focus();
			return false; 
		}else { document.getElementById("error_no_kod_penganalan").innerHTML=""; }
		if(!document.myform.emel_rasmi.value)  { 
			document.getElementById("error_email").innerHTML="medan emel rasmi diperlukan"; 
			document.getElementById("emel_rasmi").focus();
			return false; 
		}else{ document.getElementById("error_email").innerHTML="";}


		if(!document.myform.no_telefon.value)  { 
			document.getElementById("error_no_telefon").innerHTML="medan no telefon diperlukan"; 
			document.getElementById("no_telefon").focus();
			return false; 
		}else{document.getElementById("error_no_telefon").innerHTML="";}

        if(!document.myform.jawatan.value)  { 
			document.getElementById("error_jawatan").innerHTML="sila pilih jawatan"; 
			document.getElementById("jawatan").focus();
			return false; 
		}else{document.getElementById("error_jawatan").innerHTML="";}

        if(!document.myform.gred.value)  { 
			document.getElementById("error_gred").innerHTML="sila pilih gred"; 
			document.getElementById("gred").focus();
			return false; 
		}else{document.getElementById("error_gred").innerHTML="";}

        if(!document.myform.jabatan.value)  { 
			document.getElementById("error_jabatan").innerHTML="sila pilih jabatan"; 
			document.getElementById("jabatan").focus();
			return false; 
		}else{document.getElementById("error_jabatan").innerHTML="";}

      if(!document.myform.bahagian.value)  { 
			document.getElementById("error_bahagian").innerHTML="sila pilih bahagian"; 
			document.getElementById("bahagian").focus();
			return false; 
		}else{document.getElementById("error_bahagian").innerHTML="";}

      if(!document.myform.negeri.value)  { 
			document.getElementById("error_negeri").innerHTML="sila pilih negeri"; 
			document.getElementById("negeri").focus();
			return false; 
		}else{document.getElementById("error_negeri").innerHTML="";}

      if(!document.myform.daerah.value)  { 
			document.getElementById("error_daerah").innerHTML="sila pilih daerah"; 
			document.getElementById("daerah").focus();
			return false; 
		}else{document.getElementById("error_daerah").innerHTML="";}

      if(!document.myform.catatan.value)  { 
			document.getElementById("error_catatan").innerHTML="medan catatan diperlukan"; 
			document.getElementById("catatan").focus();
			return false; 
		}else{document.getElementById("error_catatan").innerHTML="";}

      if(!document.myform.image_name.value)  { 
        // document.getElementById("error_image_name").style.display = 'block';
			document.getElementById("error_image_name").innerHTML="sila muat naik gambar profil"; 
			document.getElementById("error_image_name").focus();
			return false; 
		}
		else{
         //document.getElementById("error_image_name").style.display = 'none';
			document.getElementById("error_image_name").innerHTML=""; }
      
      if(!document.myform.dokumen_name.value && document.myform.kategori.value==2)  { 
        // document.getElementById("error_image_name").style.display = 'block';
			document.getElementById("error_dokumen_name").innerHTML="sila muat naik dokumen"; 
			document.getElementById("error_dokumen_name").focus();
			return false; 
		}
		else{
         //document.getElementById("error_image_name").style.display = 'none';
			document.getElementById("error_dokumen_name").innerHTML=""; }

		const api_url = document.getElementById("api_url").value;  console.log(api_url);
    	const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);
		$.ajaxSetup({
			headers: {
				   "Content-Type": "application/json",
				   "Authorization": api_token,
				   }
	   });
      var newText = document.getElementsByClassName('error'); console.log(newText.length);
      for($i=0;$i<newText.length;$i++)
      {
         console.log(newText[$i].innerHTML="");
      }
      
		var formData = new FormData();
		formData.append('nama', document.myform.nama.value);
		formData.append('no_kod_penganalan', document.myform.no_kod_penganalan.value);
		formData.append('email', document.myform.email.value);
		formData.append('kategori', document.myform.kategori.value);
		formData.append('no_telefon', document.myform.no_telefon.value);
		formData.append('jawatan', document.myform.jawatan.value);
		formData.append('jabatan', document.myform.jabatan.value);
		formData.append('gred', document.myform.gred.value);
		// formData.append('kementerian', document.myform.kementerian.value);
		formData.append('bahagian', document.myform.bahagian.value);
		formData.append('negeri', document.myform.negeri.value);
		formData.append('daerah', document.myform.daerah.value);
		formData.append('catatan', document.myform.catatan.value);
		formData.append('documents', document.myform.dokumen.files[0]);
		formData.append('profile_image', document.myform.myFile.files[0]);
      formData.append('image_validation', document.myform.image_name);

		axios({
			method: "post",
			url: api_url+"api/user/create",
			data: formData,
			headers: { "Content-Type": "multipart/form-data","Authorization": api_token, },
		})
			.then(function (response) {
			//handle success
			console.log(response.data.code);
			if(response.data.code === '200') {	
            $("#successModalCenter").modal('show');
			}else {				
				if(response.data.code === '422') {					
					Object.keys(response.data.data).forEach(key => {						
						document.getElementById("error_" + key).innerHTML= response.data.data[key][0]; 
					  });					
				}else {					
					alert('There was an error submitting data')
				}	
			}			
			})
			.catch(function (response) {
				//handle error
				console.log(response);
				alert("There was an error submitting data");
			});
	});

   $('.close').click(function(){
        $("#successModalCenter").modal('hide');
        window.location.href = origin + '/userlist';

    });

 });
   </script>
   @endsection
