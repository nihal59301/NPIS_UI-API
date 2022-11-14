
</div>
     <!-- Mainbody_conatiner Starts -->
</div>

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
@yield('scripts' )
@stack('scripts')
</body>
<script>
  $('#agensi_card').hide()
  $(document).ready(function () {    
      $.ajax({
      type: "GET",
      url: "http://localhost:3000/jps_userlist",
      contentType: "application/json",
      dataType: "json",
      success: function(response) {  
          // console.log(response)      
          var jps_table =$('#jps_user').DataTable({     
              data: response,
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
                                  data="bahgian"
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
                          if(type === 'display'){
                                  data="PENGGUNA BKOR"
                          }
                          return data;
                      }
                  },
                  {
                      targets:-3, // Start with the last
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
      url: "http://localhost:3000/agensi_userlist",
      contentType: "application/json",
      dataType: "json",
      success: function(response) {            
          $('#agensi_user').DataTable({
          data: response,
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
                                  data="bahgian"
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
                                  data ='<img class="img-thumbnail" width="40px" src="pdf.jpg.png" alt="">'
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

  function agensi_user(){
      $('#jps_card').hide()
      $('#agensi_card').show()
  }
  function jps_user(){
      $('#agensi_card').hide()
      $('#jps_card').show()
  }

</script>
</html>