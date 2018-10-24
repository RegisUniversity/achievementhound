$( document ).ready(function() {
    
     $('#logOut').click(function () {
         
         $.ajax({
                     url: 'logout.php',
                     method: 'post',
                     success: function (response) {
                         window.location='index.php';
                     }, error: function (error) {
                         $('#login_form_message').html(error).show();
                     }
                 });
         
     });
    
});