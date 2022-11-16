
</div>
     <!-- Mainbody_conatiner Starts -->
</div>
<input type="hidden" id="api_url" value={{env('API_URL')}}>
<input type="hidden" id="token" value={{env('TOKEN')}}>
  <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>							 --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables.min.js') }}" defer></script>
<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("profile_list");
  popup.classList.toggle("show");
}
</script>
@yield('scripts' )
@stack('scripts')

<script>
    var api_url = document.getElementById("api_url").value;
    var api_token = "Bearer "+ document.getElementById("token").value;
    $.ajaxSetup({
         headers: {
                "Content-Type": "application/json",
                "Authorization": api_token,
                }
    });
    // function userData(id){
    //         user_id=id
    //         // console.log(user_id)
    //         $.ajax({
    //                 type: "GET",
    //                 url: "fectchuser",
    //                 contentType: "application/json",
    //                 dataType: "json",
    //                 header:{
    //                     'contentType': "application/json",
    //                     'Authorization':api_token
    //                 },
    //                 data:{id:user_id},
    //                 success: function(response) {
    //                     if(response){
    //                         window.location.href = "user-profile";
    //                     }
    //                 },
    //                 error: function(response) {
    //                     console.log(response);
    //                 }
    //         });
    // }
    function loadView(id)
    {
        localStorage.setItem("user_id", id);
        localStorage.setItem("user_type", "temp_user");
        window.location.href = "{{ url('/user-profile')}}";
    }
  $('#agensi_card').hide()
  
  $(document).ready(function () {   
    
    var jps = {'isJps':1}; 
    var non_jps = {'isJps':0}; 
      $.ajax({
      type: "GET",
      url: api_url+"api/user/list",
    //   url: "http://localhost:8080/api/temp/user/list",
        dataType:"json",
      contentType: "application/json",
      header:{
        'contentType': "application/json",
        'Authorization':api_token
      },
      data:jps,
      success: function(response) {  
        //   console.log(response)      
          var jps_table =$('#jps_user').DataTable({     
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
                              data = '<a value="'+row.id+'" onClick="loadView('+row.id+')" class="text-dark user_name">'+row.name+'</a>';
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
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="PENGGUNA BKOR"
                          }
                          return data;
                      }
                  },
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {
                          console.log(data);
                          if(type === 'display'){
                              if(row.jenis_pengguna_id==1 && row.row_status==1){
                                  data =
                                  '<div class="form-check form-switch">'+
                                  '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>'+
                                  '<label class="form-check-label" for="flexSwitchCheckChecked">'+
                                  '</label>'+
                                  '</div>'
                              }
                              else{
                                  data ='<div class="form-check form-switch">'+
                                  '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">'+
                                  '<label class="form-check-label" for="flexSwitchCheckChecked">'+
                                  '</label>'+
                                  '</div>'
                              };
                          }
                          return data;
                      }
                  }

              ] , 
              columns: [
                  { data: 'name'},
                  { data: 'no_ic'  },
                  { data: 'email'  },          
                  { data: 'bahagian_id'  },
                  { data: 'jawatan_id'  },
                  { data: 'row_status'  },
                  { data: 'jawatan_id'  },
                  { data: 'jawatan_id'  },
              ],
              
                 
          });

      },
      error: function(response) {
          console.log(response);
      }
      });  

      $.ajax({
        type: "GET",
        url: api_url+"api/user/list",
        //   url: "http://localhost:8080/api/temp/user/list",
            dataType:"json",
        contentType: "application/json",
        header:{
            'contentType': "application/json",
            'Authorization':api_token
        },
      data:non_jps,
      success: function(response) {            
          $('#agensi_user').DataTable({
          data: response.data,
          "language": {
          "lengthMenu": "Papar _MENU_ Entri",
          "zeroRecords": "Tiada Rekod",
          "info": "Paparan _PAGE_ hinnga 10 Dari _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtered from _MAX_ total records)",
          "search":"Carian:",
          
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
                              data = '<a class="text-dark" href="user_profile?id=' +row.id+ '">'+row.name+'</a>';
                          }
                          return data;
                      }
                  },
                  {
                      targets:3, // Start with the last
                      render: function ( data, type, row, meta ) {
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
                      targets:6, // Start with the last
                      render: function ( data, type, row, meta ) {
                          if(type === 'display'){
                                  data="PENGGUNA BKOR"
                          }
                          return data;
                      }
                  },
                  {
                      targets:5, // Start with the last
                      render: function ( data, type, row, meta ) {
                          console.log(data);
                          if(type === 'display'){
                              if(row.jenis_pengguna_id==1 && row.row_status==1){
                                  data =
                                  '<div class="form-check form-switch">'+
                                  '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>'+
                                  '<label class="form-check-label" for="flexSwitchCheckChecked">'+
                                  '</label>'+
                                  '</div>'
                              }
                              else{
                                  data ='<div class="form-check form-switch">'+
                                  '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">'+
                                  '<label class="form-check-label" for="flexSwitchCheckChecked">'+
                                  '</label>'+
                                  '</div>'
                              };
                          }
                          return data;
                      }
                  },
                  {
                      targets:7, // Start with the last
                      render: function ( data, type, row, meta ) {
                          console.log(data);
                          if(type === 'display'){
                              if(row.jenis_pengguna_id==1 && row.row_status==1){
                                  data ='<img class="img-thumbnail" width="40px" src="pdf.png" alt="">'
                              }
                          }
                          return data;
                      }
                  }
                  

              ] ,
          columns: [
              { data: 'name' },
              { data: 'no_ic'  },
              { data: 'email'  },          
              { data: 'bahagian_id'  },
              { data: 'jawatan_id'  },
              { data: 'jawatan_id'  },
              { data: 'row_status'  },
              { data: 'jawatan_id'  },
              { data: 'jawatan_id'  },
          ],
          });
      },
      error: function(response) {
          console.log(response);
      }
      });   
  })
  $('#nonjps').hide()
  function agensi_user(){
      $('#jps_card').hide()
      $('#jps').hide()
      $('#nonjps').show()
      $('#agensi_card').show()
      $("#jpsBtn").removeClass("jpsBtn");
      $("#nonjpsBtn").addClass("nonjpsBtn");
  }
  function jps_user(){
      $('#agensi_card').hide()
      $('#jps_card').show()
      $('#jps').show()
      $('#nonjps').hide()
      $("#jpsBtn").addClass("jpsBtn");
      $("#nonjpsBtn").removeClass("nonjpsBtn");
  }
  let userlist_tab_btn = document.querySelectorAll(
  ".userlist_tab_btn_container button"
);
let userlist_tab_content = document.querySelectorAll(".userlist_tab_content ");
  

</script>
</html>