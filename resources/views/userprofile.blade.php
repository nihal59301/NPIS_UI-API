
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
                        <div class="page-title-right">
                            <form class="d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-light" id="dash-daterange">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                    <i class="mdi mdi-autorenew"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                    <i class="mdi mdi-filter-variant"></i>
                                </a>
                            </form>
                        </div>
                        <h4 class="page-title">Profil Pengguna</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 justify-content-center">
                    <div class="card text-center p-5">
                        <div class="rounded-circle">
                            <img src="myfile.png" class="border w-25 align-self-center rounded-circle" alt="...">
                        </div>
                        <h5>
                            Tiger Nixon bhi Ali
                            <br>
                            <label>Pentadbir</label>
                        </h5>  
                        <button class="btn btn-success col-lg-4 col-md-3 mb-3 align-self-center">
                            Aktif
                        </button>
                           
                        <label>Jurutera Awam</label>   
                        <label>Jabatan Pengiran dan saliran(JPS)</label>
                        <label>Bahagian Korporat(BKOR)</label>                       
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
                                <button class="btn btn-success btn-sm d-flex"><i class="fa-solid fa-plus"></i> PENGGUNA</button>
                            </div>
                        </div>                   
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-xl-8 col-lg-8 justify-content-center">
                    <div class="card card-h-100 p-3">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <div class="rounded-circle d-flex">
                                    <img src="myfile.png" width="5%" class="border align-self-center rounded-circle">
                                    <h4 class="header-title align-self-center p-1">PROFIL</h4>
                                </div>
                            </div>
                            <div>
                            <button class="btn btn-sm btn-info"> <i class="mdi mdi-printer" style="font-style:normal"></i></button>
                            </div>
                        </div>
                        <div>
                        <form>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-primary">Nama</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4" class="text-primary">No. Kad Pengenalan</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-primary">No Telefon</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4" class="text-primary">Emel Rasmi</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-primary">Jabatan</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4" class="text-primary">Gred</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress"  class="text-primary">Kementerian</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6">
                                <label for="inputState" class="text-primary">Jawatan</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState" class="text-primary">Bahagian</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>Choose...</option>
                                      <option>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-primary">Negeri</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4" class="text-primary">Doerah</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-primary">Status</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4" class="text-primary">Catatan</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </div>
                            <div class=" text-center p-3">
                                <button type="button" class="back btn btn-danger">kemboli</button>
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
                    <div class="modal-body text-center">
                        Maklumat anda berjaya disimpan
                        <div class="p-1">
                            <button class="btn btn-primary btn-sm col-2">Tutup</button>
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
<script>
        $('.save').click(function(){
            $("#exampleModalCenter").modal('show');
        });
        $('.close').click(function(){
            $("#exampleModalCenter").modal('hide');
        });
</script>
@endsection




