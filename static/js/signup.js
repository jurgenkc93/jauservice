$(document).ready(function(){

	$('#password-warning').hide();
	$('#name-warning').hide();
	$('#surname-warning').hide();
	$('#password-repeat-warning').hide();
	$('#phone-warning').hide();
	$('#phone-warning-match').hide();
	$('#terms-warning').hide();

	/*
    var url = 'http://10.0.0.2/jauservice/index.php/';
	var url = 'http://localhost/jauservice/index.php/';
    */
   var url = 'https://www.jauservice.com/index.php/';
	
	$('#sign').click(function(){

		$('#password').val();
		$('#password-repeat').val();

		var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

		var phone = $('#phone').val();
		//var phoneno = /^\d{10}$/;
		var size = phone.length;

		if (size == 10){
			
			$('#phone-warning-match').hide();

			if($('#name').val() != ''){
				$('#name-warning').hide();

				if($('#surname').val() != ''){
					$('#surname-warning').hide();

					if($('#password').val().match(passw)){
						$('#password-warning').hide();

						if($('#terms-check').prop('checked')) {
							$('#terms-warning').hide();

							if($('#password').val() != $('#password-repeat').val()){
								$('#password-repeat-warning').show();

								$.alert({
									title: 'Las contraseñas no coinciden',
									content: '',
								});
								$('html,body').animate({
									scrollTop: $("#password").offset().top
								}, 'slow');

							}else{
								$('#password-repeat-warning').hide();
								
								var data = {
									"phone" : $('#phone').val(),
									"password" : $('#password').val(),
									"name" : $('#name').val(),
									"surname" : $('#surname').val()
									};

								var jsonData = JSON.stringify(data);

								$.ajax({
									contentType: 'application/json; c harset=utf-8',
									dataType: 'json',
									url: url+'api/Users/createUser',
									data: jsonData,
									type: "POST",
									success: function(data) {
										console.log("data");
										console.log(data);
										/*
										$.alert({
											title: '¿Ya tienes cuenta?',
											content: 'Ya puedes empezar a hacer uso de Kecomer!',
										});
										*/
										$.confirm({
											title: data.title,
											content: data.body,
											buttons: {
												login: {
													text : 'Iniciar Sesión',
													btnClass : 'btn-primary',
													action : function(){
														window.location.href = data.action;
													}
												},
												cancel: {
													text: 'Cerrar',
													btnClass : 'btn-secondary'
												}
											} 
										});
									},
									error: function(xhr) {
										$('#phone-warning').show();
										
										alert("Error");
										console.log(xhr);
										
										$.alert({
											title: 'Ha ocurrido un error, por favor notifique al personal',
											content: 'Por favor <a href="'+url+'welcome/user">Iniciar Sesión</a>'
										});
										

									}
								});
							}
						}else{
							$('#terms-warning').show();
							$.alert({
								title: 'Por favor acepta nuestros terminos y condiciones',
								content: '',
							});
							$('html,body').animate({
								scrollTop: $("#terms-check").offset().top
							}, 'slow');
						}
					}else{
						$('#password-warning').show();
						$.alert({
							title: 'Contraseña muy sencilla',
							content: 'La contraseña debe tener como minimo una letra mayuscula y un numero. (De 6 a 20 caracteres)',
						});
						$('html,body').animate({
							scrollTop: $("#password").offset().top
						}, 'slow');
					}
				}else{
					$('#surname-warning').show();
					$.alert({
						title: '¿A quien le entregaremos la orden?',
						content: 'Por favor introduce un apellido, aunque sea solo uno!',
					});
					$('html,body').animate({
						scrollTop: $("#surname").offset().top
					}, 'slow');
				}
			}else{
				$('#name-warning').show();
				$.alert({
					title: '¿A quien le entregaremos la orden?',
					content: 'Por favor introduce un nombre!',
				});
				$('html,body').animate({
					scrollTop: $("#name").offset().top
				}, 'slow');
			}
		} else{
			console.log("no");
			$('#phone-warning-match').show();
			$.alert({
				title: 'El teléfono no coincide!',
				content: 'Por favor introduce un número telefónico a 10 digitos!',
			});
			$('html,body').animate({
				scrollTop: $("#phonematch").offset().top
			}, 'slow');
			
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

 