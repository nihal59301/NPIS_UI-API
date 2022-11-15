
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

            <input type="hidden" id="api_url" value={{env('API_URL')}}>
            <input type="hidden" id="token" value={{env('TOKEN')}}>

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


@section('scripts')
<script>
  $('#new_agensi_card').hide()
  $(document).ready(function () {    

    const api_url = document.getElementById("api_url").value;  console.log(api_url);
    const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });
    var data_update = {'isJps':1};


      $.ajax({
      type: "GET",
      url: api_url+"api/user/temp/list",
      contentType: "application/json",
      data: data_update, 
      success: function(response) {  
          console.log(response.data)      
          var jps_table =$('#new_jps_user').DataTable({     
              data: response.data,
                "language": {
                "lengthMenu": "Papar _MENU_ Entri",
                "zeroRecords": "Nothing found - sorry",
                "info": "Paparan _PAGE_ hinnga 10 Dari _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search":"Carian:",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Akhir",
                    "previous":   "sebelem"
          }   ,
                  
      },
              columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) { console.log(data);
                          if(type === 'display'){
                              data = '<a class="text-dark" onClick="loadView('+row.id+')">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="Jabatan"
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="Jawatan"
                          }
                          return data;
                      }
                  },
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {
                          console.log(data);
                          if(type === 'display'){
                              data='<div class="d-flex">'+
                                  '<button class="btn btn-danger  m-1">Tadak Lulus</button>'+
                                  '<button class="btn btn-primary m-1" onClick="approveTempUser('+row.id+')">Lulus</button>'+
                              '</div>'
                          }
                          return data;
                      }
                  },

              ] , 
              columns: [
                  { data: 'name'},
                  { data: 'no_ic'  },
                  { data: 'email'  },          
                  { data: 'bahagian_id'  },
                  { data: 'jawatan_id'  },
                  { data: 'no_telefon'  },
                  { data: 'jawatan_id'  },
              ],
              
                 
          });
      },
      error: function(response) {
          console.log(response);
      }
      });  

  })

    function loadView(id)
    {
        localStorage.setItem("user_id", id);
        localStorage.setItem("user_type", "temp_user");
        window.location.href = "{{ url('/user-profile')}}";


    }

    function approveTempUser(id)
    {
       //alert("approve");
       const api_url = document.getElementById("api_url").value;  console.log(api_url);
       const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);
       update_user_api = api_url+"api/user/approval/";
       data_update = {'id':id};
       var jsonString = JSON.stringify(data_update);
       $.ajaxSetup({
         headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
       $.ajax({
            type: 'POST',
            url: update_user_api,
            data: jsonString, 
            success: function(response) { console.log(response.code)
                window.location.href = "{{ url('/pengasahan-pengguna-baharu')}}";
            }
        });

    }

  function new_agensi_user(){
    const api_url = document.getElementById("api_url").value;  console.log(api_url);
    const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);

    $('#new_agensi_user').DataTable().destroy();
    $('#new_jps_user').DataTable().destroy();

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });
      $('#new_jps_card').hide();
      $('#new_agensi_card').show();
      $.ajax({
      type: "GET",
      url: api_url+"api/user/temp/list",
      contentType: "application/json",
      dataType: "json",
      success: function(response) {            
          $('#new_agensi_user').DataTable({
          data: response.data,
                        "language": {
                        "lengthMenu": "Papar _MENU_ Entri",
                        "zeroRecords": "Nothing found - sorry",
                        "info": "Paparan _PAGE_ hinnga 10 Dari _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search":"Carian:",
                        "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Akhir",
                            "previous":   "sebelem"
                        }   ,
                  
      },
      columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              data = '<a class="text-dark" href="user_profile?id=' +row.id+ '">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="Jabatan"
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="Jawatan"
                          }
                          return data;
                      }
                  },
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {
                          console.log(data);
                          if(type === 'display'){
                              data='<div class="d-flex">'+
                                  '<button class="btn btn-danger m-1">Tadak Lulus</button>'+
                                  '<button class="btn btn-primary m-1">Lulus</button>'+
                              '</div>'
                          }
                          return data;
                      }
                  },

              ] , 
              columns: [
                  { data: 'name'},
                  { data: 'no_ic'  },
                  { data: 'email'  },          
                  { data: 'bahagian_id'  },
                  { data: 'jawatan_id'  },
                  { data: 'no_telefon'  },
                  { data: 'jawatan_id'  },
              ],
          });
      },
      error: function(response) {
          console.log(response);
      }
      });   
  }
  function new_jps_user(){
      $('#new_agensi_card').hide();
      $('#new_jps_card').show();
      const api_url = document.getElementById("api_url").value;  console.log(api_url);
    const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);

    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });

    $('#new_agensi_user').DataTable().destroy();
    $('#new_jps_user').DataTable().destroy();


    var data_update = {'isJps':1};
  
      $.ajax({
      type: "GET",
      url: api_url+"api/user/temp/list",
      contentType: "application/json",
      data: data_update, 
      success: function(response) {  
          console.log(response.data)      
          var jps_table =$('#new_jps_user').DataTable({     
              data: response.data,
                "language": {
                "lengthMenu": "Papar _MENU_ Entri",
                "zeroRecords": "Nothing found - sorry",
                "info": "Paparan _PAGE_ hinnga 10 Dari _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search":"Carian:",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Akhir",
                    "previous":   "sebelem"
          }   ,
                  
      },
              columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) { console.log(data);
                          if(type === 'display'){
                              data = '<a class="text-dark" onClick="loadView('+row.id+')">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="Jabatan"
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="Jawatan"
                          }
                          return data;
                      }
                  },
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {
                          console.log(data);
                          if(type === 'display'){
                              data='<div class="d-flex">'+
                                  '<button class="btn btn-danger  m-1">Tadak Lulus</button>'+
                                  '<button class="btn btn-primary  m-1">Lulus</button>'+
                              '</div>'
                          }
                          return data;
                      }
                  },

              ] , 
              columns: [
                  { data: 'name'},
                  { data: 'no_ic'  },
                  { data: 'email'  },          
                  { data: 'bahagian_id'  },
                  { data: 'jawatan_id'  },
                  { data: 'no_telefon'  },
                  { data: 'jawatan_id'  },
              ],
              
                 
          });
      },
      error: function(response) {
          console.log(response);
      }
      });
  }

</script>
@endsection





