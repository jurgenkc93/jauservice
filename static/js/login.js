$(document).ready(function(){
    
    $('#password-div').hide();
    $('#login').hide();
    $('#phone-warning').hide();

    /*
    var url = 'http://10.0.0.2/jauservice/';
    var url = 'http://localhost/jauservice/';
    */
   var url = document.getElementById('base-url').value;


   $('#find-phone').click(function(){
    var inputPhone = $('#phone').val();
        $.ajax({
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            url: url+"api/Users/getPhone/"+inputPhone,
            type: "get",	
            success: function(data) {
                if(data[0]){
                    
                    $('#phone-div').hide();
                    $('#find-phone').hide();
                    $('#password-div').show();
                    $('#phone-warning').hide();
                    $('#login').show();
                } else {
                    $('#phone-warning').show();
                  return false;
                }
                
            },
            error: function(xhr) {
                console.log("Error");
                console.log(xhr);
            }
        });
    });
     
    $('.fa-eye').click(function(){
        var input = $('#password');
        if(input.attr('type') === 'password'){
            $('#password').attr('type', 'text');
        }else{
            $('#password').attr('type', 'password');
        }
    });
    
});

