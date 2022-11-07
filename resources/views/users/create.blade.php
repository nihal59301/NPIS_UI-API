@extends('layouts.master')
   @section('content')
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

                  <div class="row">
                  <div class="col-xl-12 col-lg-12">
                                <div class="card card-h-100">
                                    <div class="d-flex card-header justify-content-between align-items-center">
                                        <h6><i class="mdi mdi-account-plus"> </i>  DAFTAR BAHARU</h6>
                                          <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-printer" style="font-style:normal"></i>
                                          </a>                                   
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
                                        <input class="form-control" type="text" name="nama">
                                       </div>
                                       <div class="col-md-6">
                                        <label>No Kod penganalan</label><br>
                                        <input class="form-control" type="text" name="no_kod_penganalan"> 
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Emel Rasmi</label><br>
                                        <input class="form-control" type="text" name="emel_rasmi">
                                       </div>
                                       <div class="col-md-6">
                                        <label>No. Telefon</label><br>
                                        <input class="form-control" type="text" name="no_telefon"> 
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jawatan</label><br>
                                        <input class="form-control" type="text" name="jawatan">
                                       </div>
                                       <div class="col-md-6">
                                        <label>Gred</label><br>
                                        <input class="form-control" type="text" name="gred"> 
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-12">
                                        <label>Kementerian</label><br>
                                        <select class="form-select form-control-light" name="kementerian">
                                          <option value="1">Kementerian Alam Sekitar don Air(KASA)</option>
                                          <option value="2">Kementerian Alam Sekitar don Air(KASA)1</option>
                                          <option value="3">Kementerian Alam Sekitar don Air(KASA)2</option>
                                          <option value="4">Kementerian Alam Sekitar don Air(KASA)3</option>
                                        </select>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jabatan</label><br>
                                          <select class="form-select form-control-light" name="kementerian">
                                             <option value="1">Jabatan Pengarian dan Saliran (JPS)</option>
                                             <option value="2">Jabatan Pengarian dan Saliran (JPS)1</option>
                                             <option value="3">Jabatan Pengarian dan Saliran (JPS)2</option>
                                             <option value="4">Jabatan Pengarian dan Saliran (JPS)3</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Bahagian</label><br>
                                        <select class="form-select form-control-light" name="bahagian">
                                             <option value=""> - Tidak Berkenan - </option>
                                             <option value="1">bahagian 1</option>
                                             <option value="2">bahagian 2</option>
                                             <option value="3">bahagian 3</option>
                                          </select>                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Negeri</label><br>
                                          <select class="form-select form-control-light" name="negeri">
                                             <option value=""> - Tidak Berkenan - </option>
                                             <option value="1">negeri 1</option>
                                             <option value="2">negeri 2</option>
                                             <option value="3">negeri 3</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Daerah</label><br>
                                          <select class="form-select" name="negeri">
                                             <option value=""> - Tidak Berkenan - </option>
                                             <option value="1">daerah 1</option>
                                             <option value="2">daerah 2</option>
                                             <option value="3">daerah 3</option>
                                          </select>                                      
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                          <label>Gambar Profil</label><br>
                                          <div class="drop-zone">
                                             <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Drop files here or click to upload</b></span>
                                             <input type="file" name="myFile" class="drop-zone__input">
                                          </div>
                                       </div>
                                       <div class="col-md-6" id="show-me">
                                          <label>Dokumen Sokongan</label><br>
                                          <div class="drop-zone">
                                             <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Drop files here or click to upload</b></span>
                                             <input type="file" name="myFile" class="drop-zone__input">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <label>Catatan</label><br>
                                          <textarea class="form-control"  rows="3"></textarea>
                                       </div>
                                    </div><br>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                       <button type="button" class="btn btn-danger" style="float:right">Kembali</button>
                                       </div>
                                       <div class="col-md-6">
                                       <button type="button" class="btn btn-primary">Simpan</button>
                                       </div>
                                    </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                  </div>
               </div>
            </div>
            <!-- End Content-->
         </div>
      </div>
   @endsection

   @section('scripts')
   <script src="assets/js/main.js"></script>
   @endsection
