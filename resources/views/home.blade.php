@extends('layouts.master')

@section('content')
<div class="NPIS_Container">

      <!-- Mainbody_conatiner Starts -->
      <div class="Mainbody_conatiner ">       
        <div class="Mainbody_content mtop">
          <div class="Mainbody_content_nav_header d-flex">
            <ul class="path_nav ml-auto">
              <li>
                <a href="#"
                  ><img
                    src='{{ asset("assets/images/Vector-10.png") }}'
                    class="globe"
                    alt="globe"
                  />
                  Geo-board
                  <img
                    class="arrow_nav"
                    src='{{ asset("assets/images/arroew.png") }}'
                    alt="arroew"
                  />
                </a>
              </li>
              <li>
                <a href="#" class="active"> Pentadbir </a>
              </li>
            </ul>
          </div>
          <div class="dashboard_content_container">
            <div class="box_container row">
              <div class="col-3 box_child">
                <div class="box_content">
                  <h3 id = "userCount">0</h3>

                  <p>Pengguna Berdaftar</p>
                </div>
              </div>
              <div class="col-3 box_child">
                <div class="box_content">
                  <h3 id = "usersJps">0</h3>
                  <p>Pengguna JPS</p>
                </div>
              </div>
              <div class="col-3 box_child">
                <div class="box_content">
                  <h3 id = "usersAgensi">0</h3>
                  <p>Pengguna Agensi</p>
                </div>
              </div>
              <div class="col-3 box_child">
                <div class="box_content">
                  <h3 id = "usersTemp">0</h3>
                  <p>Permohonan Baharu</p>
                </div>
              </div>
            </div>
            <input type="hidden" id="api_url" value={{env('API_URL')}}>
            <input type="hidden" id="app_url" value={{env('APP_URL')}}>
            <!-- dashboard_chart_table_container starts -->
            <div class="dashboard_chart_table_container">
            <div class="dashboard_chart_detail_container">
                <div class="dashboard_chart"><div id="bar_chart"></div></div>
                <div class="dashboard_detail_container"></div>
              </div>
              <div class="dashboard_table_container" style="width:auto">
                <div class="dashboard_table_content">
                  <div class="dashboard_table_header">
                    <div class="dashboard_table_header_left d-flex">
                      <img src='{{ asset("assets/images/card.png") }}' alt="card" />
                      <h3>SENARAI PERMOHONAN BAHARU</h3>
                    </div>
                  </div>
                  <div class="dashboard_table_holder">
                    <table id="temp_user" class="dashboard_table table">
                    <thead>
                        <tr>
                           <th class="float-left">Nama</th>                           
                           <th>Emel</th> 
                           <th>Jabatan</th>
                           <th>Bahagian</th> 
                           <th>Jawatan</th>                            
                           <th>Documen Sokongan</th> 
                           <th>Tindakan</th>               
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="user_profile_footer m-0 P-3">2022 © NPIS-JPS</p>
      </div>

      <!-- Mainbody_conatiner Starts -->
    </div>

    <section>
      <div class="container"></div>
    </section>
    <script src="{{ asset('assets//js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets//js/bootstrap.popper.min.js') }}"></script>
    <script src="{{ asset('assets//js/highcharts.js') }}"></script>

    <script src="{{ asset('assets//js/index.js') }}"></script>
    <script src="{{ asset('assets//js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets//js/bootstrap.bundle.min.js') }}"></script>

    <script>
      function loadTempUser(id)
    {  
        var url = '{{ route("user.profile", ["temp",":id"])}}'
        console.log(url)
        url = url.replace(':id', id);        
        window.location.href = url;
    }

    function downloadDoc(id) {
      const api_url = document.getElementById("api_url").value;  console.log(api_url);
       const api_token = "Bearer "+ document.getElementById("token").value;  console.log(api_token);
       update_user_api = api_url+"api/user/user/download/";
       data_update = {'user_id':id, 'type':'temp'};
       var jsonString = JSON.stringify(data_update);
       $.ajaxSetup({
         headers: {
                    "Content-Type": "application/json",
                    "Authorization": api_token,
                    }
        });
       $.ajax({
            type: 'GET',
            url: update_user_api,
            data: {'user_id':id, 'type': 'temp'} , 
            //dataType:"json",
            xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 2) {
                            if (xhr.status == 200) {
                                xhr.responseType = "blob";
                            } else {
                                xhr.responseType = "text";
                            }
                        }
                    };
                    return xhr;
                },
            //contentType: "application/pdf",
            success: async function(data) { 
               console.log('downlaoded')
               console.log(data)
               //Convert the Byte Data to BLOB object.
               var blob = new Blob([data], { type: "application/octetstream" });
 
               //Check the Browser type and download the File.
               // var isIE = false || !!document.documentMode;
               // if (isIE) {
               //    window.navigator.msSaveBlob(blob, fileName);
               // } else {
                  var url = window.URL || window.webkitURL;
                  link = url.createObjectURL(blob);
                  var a = $("<a />");
                  a.attr("download", 'document.pdf');
                  a.attr("href", link);
                  $("body").append(a);
                  a[0].click();
                  $("body").remove(a);
               //}
                //window.location.href = "{{ url('/home')}}";
            }
        });
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
                window.location.href = "{{ url('/home')}}";
            }
        });

    }
$(document).ready(function () {   

   var api_url = document.getElementById("api_url").value;
    var api_token = "Bearer "+ document.getElementById("token").value;
    var jps = {'isJps':1}; 
    var non_jps = {'isJps':0}; 
      $.ajax({
      type: "GET",
      url: api_url+"api/user/temp/list",
    //   url: "http://localhost:8080/api/temp/user/list",
        dataType:"json",
      contentType: "application/json",
      header:{
        'contentType': "application/json",
        'Authorization':api_token
      },
      data:jps,
      success: function(response) {  
        console.log(response.data)      
          var jps_table =$('#temp_user').DataTable({     
              data: response.data,
              "language": {
                "lengthMenu": "Papar _MENU_ Entri",
                "zeroRecords": "Nothing found - sorry",
                "info": "Paparan _PAGE_ hinnga 10 Dari _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "_INPUT_",
                "searchPlaceholder": "Carian",
                "paginate": {
                "first":      "Awal",
                "last":       "Seterusnya",
                "next":       "Akhir",
                "previous":   "Sebelum"
                }, 
                },
              columnDefs: [
                  {
                      targets:0, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                              //data=row.name
                              data = '<a value="'+row.id+'" onClick="loadTempUser('+row.id+')" class="text-dark user_name">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:1, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.email
                          }
                          return data;
                      }
                  },
                  {
                      targets:2, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.jabatan.nama_jabatan
                          }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
                            // console.log(row.bahagian.nama_bahagian)
                          if(type === 'display'){
                                  data=row.bahagian.nama_bahagian
                          }
                          return data;
                      }
                  },
                  {
                      targets:4, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data=row.jawatan.nama_jawatan
                          }
                          return data;
                      }
                  },
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){                           
                           data=''
                           if(row.media.length == 2){
                              data = 
                                 '<img src="assets/images/pdf.png" alt="pdf" onClick="downloadDoc('+row.id+')"/>'
                              
                           }
                              
                          }
                          return data;
                      }
                  },
                  {
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {                          
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
                  { data: 'email'  },
                  { data: 'jabatan_id'  },          
                  { data: 'bahagian_id'  },
                  { data: 'jawatan_id'  },
                  { data: 'email'  },
                  { data: 'row_status'  },
              ],
              
                 
          });

      },
      error: function(response) {
          console.log(response);
      }
      });     
      
      $.ajax({
      type: "GET",
      url: api_url+"api/user/dashboard",
    
        dataType:"json",
      contentType: "application/json",
      header:{
        'contentType': "application/json",
        'Authorization':api_token
      },
      data:jps,
      success: function(response) {  
         console.log(response.data)
         document.getElementById('userCount').innerHTML
                = response.data.users
         document.getElementById('usersJps').innerHTML
               = response.data.users_jps
         document.getElementById('usersAgensi').innerHTML
               = response.data.users_agensi
         document.getElementById('usersTemp').innerHTML
               = response.data.users_temp
      },
      error: function(response) {
          console.log(response);
      }
      });

   });

      </script>
@endsection
