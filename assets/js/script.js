
// On page loaded
$( document ).ready(function() {

    // Set the "who" message
    set_who_message();

    // On change fist name input
    $("#first_name").keyup(function() {
        
        // Set the "who" message
        set_who_message();
        
        if(validation_name($("#first_name").val()).code === 0) {
            $("#first_name").attr("class", "form-control is-invalid");
            $("#first_name_feedback").html(validation_name($("#first_name").val()).message);
        } else {
            $("#first_name").attr("class", "form-control");
            $("#first_name_feedback").html("");
        }
    });

    // On change last name input
    $("#last_name").keyup(function() {
        // Set the "who" message
        set_who_message();
        
        if(validation_name($("#last_name").val()).code === 0) {
            $("#last_name").attr("class", "form-control is-invalid");
            $("#last_name_feedback").html(validation_name($("#last_name").val()).message);
        } else {
            $("#last_name").attr("class", "form-control");
            $("#last_name_feedback").html("");
        }
    });
    
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
    
    // On Blur phone input
    $("#tel").blur(function() {
        var tel = $('#tel').val();
        var regEx = /(((\(\d{3}\) ?)|(\d{3}-)|(\d{3}\.))?\d{3}(-|\.)\d{4})/g; 
        var validNumber = regEx.test(tel);
        if (!validNumber) {
        $("#phone_feedback").html("Enter a valid number");
        }
        if (validNumber) {
            $("#phone_feedback").html("");

         }
    });
    
    // On Blur password input
    $("#password").blur(function() {
        var passwd = $('#password').val();
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
    
    // On Blur confirm password input
    $("#password_conf").blur(function() {
        var conf_passwd = $('#password_conf').val();
        var passwd = $('#password').val();
        if (conf_passwd.length === 0) {
            $("#passwd_conf_feedback").html("Confirm password can't left blank");
        }
        else if (conf_passwd.length < 6) {
            $("#passwd_conf_feedback").html("Confirm password length should be 6 or more characters");
        }
        else if(passwd !== conf_passwd){
             $("#passwd_conf_feedback").html("Password and confirm password are not matching");
        }
        else if(passwd === conf_passwd){
             $("#passwd_conf_feedback").html("");
        }
    });
    
   $('#add_user').click(function () {

        var data = {
                page: 'signup',
                action: 'insert_user',
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                email: $('#email').val(),
                phone: $('#tel').val(),
                password: $('#password').val(),
                password_conf: $('#password_conf').val()
             };
            /** var output = '';
            for (var property in data) {
              output += property + ': ' + data[property]+'; ';
            }
            alert(output);
            */
           if (data.first_name === '' || data.last_name === '' || data.email === '' || data.phone === '' || data.password === '' || data.password_conf === '') {
                $('#addcustomer_form_message').html('Field Must Not Be Empty');
            } else {
                if (!data.first_name.match("^[a-zA-Z\- ]+$")) {
                    $('#addcustomer_form_message').html('The first name use non-alphabetics characters');
                    return false;
                }
                if (!data.last_name.match("^[a-zA-Z\- ]+$")) {
                    $('#addcustomer_form_message').html('The last name use non-alphabetics characters');
                    return false;
                }
                if (data.email)
                {
                    var regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    var validEmail = regEx.test(data.email);
                    if (!validEmail) {
                    $('#addcustomer_form_message').html('Enter a valid email');
                    return false;
                    }
                }
                if (data.phone)
                {
                    regEx = /(((\(\d{3}\) ?)|(\d{3}-)|(\d{3}\.))?\d{3}(-|\.)\d{4})/g;
                    var validNumber = regEx.test(data.phone);
                    if (!validNumber) {
                    $("#addcustomer_form_message").html("Enter a valid number");
                    return false;
                    }
                }
                if(data.password.length< 6) {
                    $("#addcustomer_form_message").html("Password length should be 6 or more characters");
                    return false;
                }
                if(data.password_conf.length< 6) {
                    $("#addcustomer_form_message").html("Confirm password length should be 6 or more characters");
                    return false;
                }
                if(data.password !== data.password_conf) {
                    $("#addcustomer_form_message").html("Password and confirm password are not matching");
                    return false;
                }
                $.ajax({
                     url: 'functions.php',
                     data: data,
                     method: 'post',
                     success: function (response) {
                         
                         window.location='thankyou.php?type='+response;
                        
                     }, error: function (error) {
                         $('#addcustomer_form_message').html(error).show();
                     }
                 });

            
            }
         
     });
    
    
});



/**
 * 
 * Click to view all user list
 * 
 */

$('#view_user').click(function () {
    
   
    
    $.ajax({
                     success: function (response) {
                         
                          window.location='userlist.php';
                        
                     }, error: function (error) {
                         $('#addcustomer_form_message').html(error).show();
                     }
                 });
   
});


/**
 * 
 * Click to view all user report
 * 
 */

$('#view_report').click(function () {
    
   
    
    $.ajax({
                     success: function (response) {
                         
                          window.location='viewreport.php';
                        
                     }, error: function (error) {
                         $('#addcustomer_form_message').html(error).show();
                     }
                 });
   
});



/**
 * 
 * Click to view all user report
 * 
 */

$('#add_info').click(function () {
    
   
    
    $.ajax({
                     success: function (response) {
                         
                          window.location='add_info.php';
                        
                     }, error: function (error) {
                         $('#addInfo_form_message').html(error).show();
                     }
                 });
   
});




/**
*   Set "who" message
*/
function set_who_message() {
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    if (first_name.length === 0)
    {
        $("#first_name_feedback").html("This field can't be blank");
        
    }
    if (last_name.length === 0) {
        
        $("#last_name_feedback").html("This field can't be blank");
        $("#who_message").html("Who are you?");
    } else {
        // Informations completed
        $("#who_message").html(first_name+" "+last_name);
    }
}

/**
*   Validation function for last name and first name
*/
function validation_name (val) {
    if (val.length === 0) {
        // is not valid : name length
        return {"code":0, "message":"This field can't be blank"};
    }
    if (val.length < 2) {
        // is not valid : name length
        return {"code":0, "message":"The name is too short"};
    }
    if (!val.match("^[a-zA-Z\- ]+$")) {
        // is not valid : bad character
        return {"code":0, "message":"The name use non-alphabetics characters"};
    }
    
    // is valid
    return {"code": 1};
}