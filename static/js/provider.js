$(document).ready(function(){
    
	/*
    var url = 'http://10.0.0.2/jauservice/index.php/';
	var url = 'http://jauservice.kecomer.com.mx/index.php/';
    */
   var url = 'http://localhost/jauservice/index.php/';
    
    $('.request-appointment').click(function(){

        var id = this.id;
        var phone = $('#phone').val();

        if(phone != null){
            $.confirm({
                title: '<h5><i class="far fa-calendar-alt"></i>  Contactar</h5>',
                content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label>Mencione cual es su problema y me comunicaré con usted</label>' +
                    '<textarea type="text" id="reason" placeholder="Motivo..." class="name form-control" required /></textarea>' +
                    '</div>' +
                    '</form>',
                    buttons: {
                        accept: {
                        text : 'Sí, ocultar',
                        btnClass : 'btn-primary',
                        action : function(){
    
                            var data = {
                                "phone" : phone,
                                "provider" : id,
                                "reason" : $('#reason').val()
                                };
                    
                            var jsonData = JSON.stringify(data);
                            
                            console.log(data);
                            console.log(jsonData);
                            
                            $.ajax({
                                contentType: 'application/json; charset=utf-8',
                                dataType: 'json',
                                url: url+'api/Users/appointment',
                                data: jsonData,
                                type: "POST",
                                success: function(data) {
                                    
                                    $.alert({
                                        title: data.title,
                                        content: data.body,
                                    });
                                    /*
                                    */
                                    //window.location.href = url+"welcome/user";
                                },
                                error: function(xhr) {
                                    
                                    $.alert({
                                        title: '¡Algo salió mal!',
                                        content: 'Por favor intente de nuevo o mas tarde.'
                                    });
                    
                                }
                            });
                        }
                    },
                    deny: {
                        text : 'No',
                        btnClass : 'btn-primary',
                        action : function(){
                            //window.location.href = url+"welcome/user";
                        }
                    }
                } 
            });
            
        }else{
            $.alert({
                title: 'Inicie sesión!',
                content: '<a href="'+url+'welcome/user">Para poder contactar inicie sesión!</a>'
            });
            
        }
        
    });
    

});