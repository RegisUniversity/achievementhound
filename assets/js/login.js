
// On page loaded
$( document ).ready(function() {

    // On Blur email input
    $("#email").blur(function() {
        var email = $('#email').val();
        if (email.length < 1) {
             $("#email").attr("class", "form-control is-invalid");
             //var message="Enter a valid email";
             //$("#email_feedback").html(validation_name($("#email").val()).message);
             $("#email_feedback").html("Enter a valid email.");
          } else {
            var regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var validEmail = regEx.test(email);
            if (!validEmail) {
            $("#email_feedback").html("Enter a valid email");
            }
            if (validEmail) {
                $("#email_feedback").html("");
            }
         }
    });
    
    
    // On Blur password input
    $("#passwd").blur(function() {
        var passwd = $('#passwd').val();
        if (passwd.length === 0) {
            $("#passwd_feedback").html("Password can't left blank");
        }
        else if (passwd.length < 6) {
            $("#passwd_feedback").html("Password length should be 6 or more characters");
        }
        else{
             $("#passwd_feedback").html("");
        }
            
        
    });
    
    
    
   $('#login').click(function () {

        var data = {
                page: 'login',
                action: 'login_user',
                email: $('#email').val(),
                passwd: $('#passwd').val()
             };
          /** var output = '';
            for (var property in data) {
              output += property + ': ' + data[property]+'; ';
            }
            alert(output);*/
            
           if (data.email === '' || data.passwd === '') {
                $('#login_form_message').html('Field Must Not Be Empty');
            } else {
                if (data.email)
                {
                    var regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    var validEmail = regEx.test(data.email);
                    if (!validEmail) {
                    $('#login_form_message').html('Enter a valid email');
                    return false;
                    }
                }
                if(data.passwd.length< 6) {
                    $("#login_form_message").html("Password length should be 6 or more characters");
                    return false;
                }
                $.ajax({
                     url: 'functions.php',
                     data: data,
                     method: 'post',
                     success: function (response) {
                         
                        if(response ==1) 
                            window.location='dashboard.php';
                        else
                            window.location='index.php?response=2';
                        
                     }, error: function (error) {
                         $('#login_form_message').html(error).show();
                     }
                 });

            
            }
         
     });
    
    
});


