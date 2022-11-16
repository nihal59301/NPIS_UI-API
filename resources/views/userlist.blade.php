
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
.jpsBtn{
    border-bottom-width: 3.5px !important;
    border-bottom-color: #39AFD1 !important;
    border-left: none !important;
    border-right: none !important;
    border-top:none !important;
    color: #38afd1 !important;
}
.jpsBtn:hover{
    outline:0 !important;
}
.nonjpsBtn:hover{
    outline: 0 !important;
}

.nonjpsBtn:focus{
    border-bottom-width: 3.5px !important;
    border-bottom-color: #39AFD1 !important;
    border-left: none !important;
    border-right: none !important;
    border-top:none !important;
    color: #38afd1 !important;
}
.jpsBtn:focus{
    border-bottom-width: 3.5px !important;
    border-bottom-color: #39AFD1 !important;
    border-left: none !important;
    border-right: none !important;
    border-top:none !important;
    color: #38afd1 !important;
}


.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: rgb(255, 255, 255) !important;
    font-weight: 900 !important;
    border: 1px solid #38afd1 !important;
    border-radius: 50%;
    background-color: #38afd1 !important;
    background:#38afd1 !important;

}

.form-check-input:checked {
    background-color: #0acd95 !important;
    border-color: #0acd95 !important;
}
.form-check-input{
    height: 1.5em !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    min-width: 0.5em !important;
    padding: 0.5em 1em !important;
    margin-left: 0px !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: none;
  color: black!important;
  border-radius: 50%;
}
#jps{
    font-size: 1.2rem !important;
    font-weight: 500 !important;
}
#nonjps{
    font-size: 1.2rem !important;
    font-weight: 500 !important;
}

th{
    color: #656b9b !important;
}

table.dataTable thead th, table.dataTable thead td {
    border-bottom: none !important;
}
div.dataTables_wrapper div.dataTables_length label {
    color: gray !important;
    font-weight: 600 !important;
    
}
div.dataTables_wrapper div.dataTables_length select {
    width: 70px !important;
    height: 35px !important;
    text-align: center;
    padding: 5px;
    border-radius: 5px;
    display: inline-block;
}
.btn {
    --ct-btn-border-width: 0px !important;
}

/* div.dataTables_wrapper div.dataTables_length select:focus {
    filter:drop-shadow(2px 2px 2px #7adaf5);
} */

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
                                    <div class="d-flex ">
                                    <img src="images/card.png" height="30px" alt="card" />
                                    <h1 id="jps" class="header-title p-1 jps ml-5">SENARAI PENGGUNA JPS</h1>
                                    <h1 id="nonjps" class="header-title p-1 nonjps ml-5">SENARAI PENGGUNA AGENSI LUAR</h1>
                                    </div>
                                    <div>
                                    <button class="btn btn-success"><img class="border bg-white rounded-circle mx-auto p-1" src="images/plus.png"/> PENGGUNA</button>
                                    <button class="btn btn-info"> <i class="mdi mdi-printer h4" style="font-style:normal"></i></button>
                                    </div>
                                </div>
                                <div>
                                    

                                </div>
                                <div>
                                <button id="jpsBtn" style="margin-bottom: -8px;" onclick="jps_user()" class="btn btn-white col-3 col-lg-1  btn-sm border-none text-black jpsBtn active" ><strong><h4>JPS<h4></strong></button>
                                <button id="nonjpsBtn" style="margin-bottom: -8px;" onclick="agensi_user()" class="btn btn-white btn-sm  border-none nonjpsBtn text-black"><h4>AGENSI LUAR<h4></button>
                                </div>
                                <hr>
                                <div id="jps_card" class="card-body pt-0 mb-4">
                                    <table id="jps_user" width="100%" class=" display ">
                                        <thead>
                                            <tr>
                                                <th class="float-left">Nama</th>
                                                <th>No. Kad Pengenalan</th>
                                                <th>Emel</th> 
                                                <th>Bahagian</th> 
                                                <th>Jawatan</th> 
                                                <th>Aktif/Tidak Aktif</th> 
                                                <th>Peranan</th> 
                                                <th>Tindakan oleh</th>               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> <!-- end card-body-->
                                <div id="agensi_card" class="card-body pt-0 mb-4">
                                    <table id="agensi_user" width="100%" class="display">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>No. Kad Pengenalan</th>
                                                <th>Emel</th> 
                                                <th>Bahagian</th> 
                                                <th>Jawatan</th> 
                                                <th>Aktif/Tidak Aktif</th> 
                                                <th>Peranan</th> 
                                                <th>Dokumen Sokongan</th>
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



