$(document).ready(function(){
      
    $('.chosen').chosen();

	/*
    var url = 'http://10.0.0.2/jauservice/index.php/';
	var url = 'http://jauservice.kecomer.com.mx/index.php/';
    */
   var url = 'http://localhost/jauservice/index.php/';
    
	$('#add-category').click(function(){

        var data = {
            "id" : $('#select-category').val(),
            "phone" : $('#phone').val(),
            "description" : $('#description-new').val()
            };
        var jsonData = JSON.stringify(data);
        
        $.ajax({
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            url: url+'api/Users/addCategory',
            data: jsonData,
            type: "POST",
            success: function(data) {
                console.log("Data:");
                console.log(data);
                
                $.alert({
                    title: data.title,
                    content: data.body,
                });
                $('#description-new').val("");
            },
            error: function(xhr) {
                $.alert({
                    title: '¡Algo salió mal!',
                    content: 'Por favor intente de nuevo o mas tarde.'
                });
            }
        });

    });

	$('#about').click(function(){

        var data = {
            "phone" : $('#phone').val(),
            "description" : $('#description').val()
            };
        var jsonData = JSON.stringify(data);
        
        $.ajax({
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            url: url+'api/Users/editAbout',
            data: jsonData,
            type: "POST",
            success: function(data) {
                
                $.alert({
                    title: data.title,
                    content: data.body,
                });
            },
            error: function(xhr) {
                $.alert({
                    title: '¡Algo salió mal!',
                    content: 'Por favor intente de nuevo o mas tarde.'
                });
            }
        });

    });
    
	$('.edit-category-descripton').click(function(){
        var id = this.id;
        
        var data = {
            "id" : id,
            "phone" : $('#phone').val(),
            "description" : $('#category-descripton-'+id).val()
            };

            var jsonData = JSON.stringify(data);
        
        $.ajax({
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            url: url+'api/Users/editCategory',
            data: jsonData,
            type: "POST",
            success: function(data) {

                $.alert({
                    title: data.title,
                    content: data.body,
                });
            },
            error: function(xhr) {
                
                $.alert({
                    title: '¡Algo salió mal!',
                    content: 'Por favor intente de nuevo o mas tarde.'
                });

            }
        });

    });


    $('.deactivate-category').click(function(){
        var id = this.id;
        var data = {
            "id" : id,
            "phone" : $('#phone').val()
            };

            var jsonData = JSON.stringify(data);

        $.confirm({
            title: '¿Esta seguro qu desea dar de baja esta categoría?',
            content: 'Con esta acción el publico ya no podrá ver sus conocimientos en esta area',
            buttons: {
                accept: {
                    text : 'Sí, ocultar',
                    btnClass : 'btn-primary',
                    action : function(){

                        $.ajax({
                            contentType: 'application/json; charset=utf-8',
                            dataType: 'json',
                            url: url+'api/Users/downCategory',
                            data: jsonData,
                            type: "POST",
                            success: function(data) {
                
                                $.alert({
                                    title: data.title,
                                    content: data.body,
                                });
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
    });
    
    $('.table').on('click', 'tbody tr td .btn-info', function(){
        var tag = this;
        var cart;

        var name = $('#name-'+this.id).text();
        
        $.confirm({
            title: name,
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Indicaciones adicionales a tu pedido:</label>' +
            '<input type="text" id="indications" value="' + $('#indications-'+tag.id).val() + '" class="name form-control" required />' +
            '<label>Cantidad:</label>' +
            '<input type="number" id="quantity" value="' + $('#quantity-'+tag.id).text() + '" class="form-control" min="1" max="30"/>' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Modificar',
                    btnClass: 'btn-success',
                    action: function () {

                        var indications = $('#indications').val();
                        var quantity = $('#quantity').val();

                        var data = {
                            indications : indications,
                            quantity : quantity
                        };

                        var jsonData = JSON.stringify(data);

                        $.ajax({
                            contentType: 'application/json; charset=utf-8',
                            dataType: 'json',
                            url: url+'api/Cart/editItem/'+tag.id,
                            data: jsonData,
                            type: "POST",	
                            success: function(data) {
                                $.alert({
                                    title: data.title,
                                    content: data.body,
                                });

                                cart = data.cart_items;
                                
                            },
                            error: function(xhr) {
                                console.log('Error');
                                console.log(xhr);
                            }
                        });
                        
                        $('#indications-'+tag.id).val(indications)
                        $('#quantity-'+tag.id).text(quantity);
                        
                        $('#cart_items').html(cart);
                        calculateTotals();
                    }
                },
                cancelar: function () {
                    //close
                },
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
        
    });
    
    $('#description').keypress(function(e) {
        var tval = $('#description').val(),
            tlength = tval.length+1,
            set = 200,
            remain = parseInt(set - tlength);
        $('#count-description').text(tlength+"/200");
        if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
            $('#description').val((tval).substring(0, tlength - 1));
            return false;
        }
    });

    $('#new-category-descripton').keypress(function(e) {
        var tval = $('#new-category-descripton').val(),
            tlength = tval.length+1,
            set = 1050,
            remain = parseInt(set - tlength);
        $('#count-new-category-descripton').text(tlength+"/1050");
        if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
            $('#count-new-category-descripton').val((tval).substring(0, tlength - 1));
            return false;
        }
    });
    

    $('.category-descripton').keypress(function(e) {
        var tval = $('#'+this.id).val(),
            tlength = tval.length+1,
            set = 1050,
            remain = parseInt(set - tlength);
        $('#count-'+this.id).text(tlength+"/1050");
        if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
            $('#count-'+this.id).val((tval).substring(0, tlength - 1));
            return false;
        }
    });



});