$(document).ready(function(){
    
    $('#submit-button').hide();
    $('#password-warning').hide();
    $('#password-repeat-warning').hide();
    
    /*
    var url = 'http://10.0.0.2/jauservice/';
    var url = 'http://localhost/jauservice/';
    */
   var url = document.getElementById('base-url').value;
   
   var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
   
   $("#password").keyup(function() {
       if($("#password").val().match(passw)){
            $('#submit-button').show();
            $('#password-warning').hide();
            $('#password-repeat-warning').hide();
            if($('#password').val() != $('#password-repeat').val()){
                $('#submit-button').hide();  
                $('#password-repeat-warning').show();
            }
           $('html,body').animate({
               scrollTop: $("#submit-button").offset().top
            }, 'slow');
        }else{
            $('#password-warning').show();
        }

  });

   $("#password-repeat").keyup(function() {
       if($('#password').val() == $('#password-repeat').val()){
           $('#password-repeat-warning').hide();
           
           if($("#password").val().match(passw)){
               $('#password-warning').hide();
               $('#password-repeat-warning').hide();
               $('#submit-button').show();

               $('#submit-button').prop('disabled', false);

               $('html,body').animate({
                    scrollTop: $("#submit-button").offset().top
                }, 'slow');
            }else{
                $('#password-warning').show();
                $('html,body').animate({
                    scrollTop: $("#password-warning").offset().top
                }, 'slow');
            }
        }else{
            $('#password-repeat-warning').show();
            $('#submit-button').hide();

        }
  });
  

  $('.fa-eye').click(function(){
        var id = this.id;
        id = id.replace('eye-', '');
        var input = $('#'+id);
        if(input.attr('type') === 'password'){
            $('#'+id).attr('type', 'text');
        }else{
            $('#'+id).attr('type', 'password');
        }
    });

});

