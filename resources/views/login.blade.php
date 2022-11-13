@include('layouts/header_latest')
<script src={{"assets/js/jquery.min.js"}}></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
@php
 $site_key="6Lfto-8iAAAAAH_Z0bck7F3XtBBvPN6-Jbj44rib";
 $secret_key="6Lfto-8iAAAAAE_EqMEmYoBf-dyXWGfknA7b254N";  
@endphp

<div class="container">
    <div class="row vh-100 justify-content-center">
        <div class="col-5 align-self-center border p-3">
            <form method="post">
                @csrf
                <div class="form-group">
                <div class="col-12 text-center">
                    <label id="invalid" class="text-danger d-none"></label>
                </div>
                <label for="user_email">Email address</label>
                <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                <label for="user_pass">Password</label>
                <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Password">
                <div class="col-12 text-end mt-1">
                    <strong><a href="forget-password">Forger Passwort?</a></strong>
                </div>
                </div>
                <div class="mt-2 mb-2">
                    <div class="g-recaptcha" data-sitekey={{$site_key}} data-callback="onReturnCallback"  name="g-recaptcha-response"></div>
                </div>
                <div class="float-end">
                    <button id="login" type="button" value="" class="btn btn-success" disabled>Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

var onReturnCallback = function(response) {     
    if(response){
        $("#login").prop('disabled', false); 
            $("#login").click(function(){
                var name=$("#user_email").val();
                // var pass=$("#user_pass").val();
                var plainText = document.getElementById('user_pass').value;
                var md = forge.md.sha256.create();  
                md.start();  
                md.update(plainText, "utf8");  
                var hashText = md.digest().toHex();
                // console.log(hashText)        
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/login",
                    dataType: 'json',
                    data:JSON.stringify({
                        name:name,
                        pass:hashText
                    }),
                    contentType:'application/json',
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'X-XSRF-TOKEN':'eyJpdiI6Ik1BdFRTS0JOTXVncHpQQlFDM1FvR1E9PSIsInZhbHVlIjoib3ZwQ2lBT1RDZTFvUDdNSlZtR291YWJqbFQ0ZXdERC94VHhWSmppcHpISS9QVnV3a3V6Z3VGM0FDWWdYbHp1SmkvVzhqQ1k1RVhnUmRzZzFJMHRmRTQvYVcyMlRmR0xqS3E2RkFDcFlvYzNCcFNocncvMmZBSVVjN1A0bjRtZzEiLCJtYWMiOiIxYzFhMjU3YmQ0NTBiODQ2MGZkOWRkNTIwZDNlMmFhYTdjMGRlNjNhZWI5NGQ1MjRlNGM1ODg3NzllYTY5MmE4IiwidGFnIjoiIn0%3D'
                    },
                    success: function (data){
                        console.log(data);
                        user_name=data[0].name;
                        user_pass=data[0].pass;
                        // console.log(user_pass==hashText)
                        // return
                        if(user_name==name && user_pass==hashText){
                            $("#invalid").addClass('d-none');
                            window.location.href = "home";

                        }
                        else{
                            $("#invalid").removeClass('d-none').text('Invalid Credentials');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
        })
          
    }
}

</script>
