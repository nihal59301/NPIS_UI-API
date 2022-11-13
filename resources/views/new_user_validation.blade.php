
@extends('layouts.master')

@section('content')
<style>
    hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1.8px;
} 
.border-bottom{
    border-bottom-color: aqua !important;
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
                <div class="col-xl-12 col-lg-12">
                    </div> <!-- end col -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card card-h-100">
                                <div class="d-flex card-header justify-content-between align-items-center">
                                    <h4 class="header-title">SENARAI PENGGUNA BAHARU JPS</h4>
                                    <div>
                                    <button class="btn btn-sm btn-info"> <i class="mdi mdi-printer" style="font-style:normal"></i></button>
                                    </div>
                                </div>
                                <div>

                                </div>
                                <div>
                                <button style="margin-bottom: -8px;" onclick="new_jps_user()" class="btn btn-white col-3 col-lg-1  btn-sm  border-bottom text-black"><strong>JPS</strong></button>
                                <button style="margin-bottom: -8px;" onclick="new_agensi_user()" class="btn btn-white text-info btn-sm">AGENSI LUAR</button>
                                </div>
                                <hr>
                                <div id="new_jps_card" class="card-body table-responsive pt-0 mb-4">
                                    <table id="new_jps_user" width="100%" class="display">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>No.Kad Pengenalan</th>
                                                <th>Emel</th> 
                                                <th>Jabatan</th> 
                                                <th>Jawatan</th> 
                                                <th>No Telefon</th> 
                                                <th>Tindakan oleh</th>               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> <!-- end card-body-->
                                <div id="new_agensi_card" class="card-body table-responsive pt-0 mb-4">
                                    <table id="new_agensi_user" width="100%" class="display">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>No.Kad Pengenalan</th>
                                                <th>Emel</th> 
                                                <th>Jabatan</th> 
                                                <th>Jawatan</th> 
                                                <th>No Telefon</th> 
                                                <th>Tindakan oleh</th>                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>  <!-- end card-body-->
                                
                            </div> <!-- end card-->

                        </div> <!-- end col -->
                    </div>
            <!-- end row -->
        </div>
    </div>
</div>


@endsection




