$(document).ready(function(){

  $('#body').keypress(function(e) {
    var tval = $('textarea').val(),
        tlength = tval.length+1,
        set = 500,
        remain = parseInt(set - tlength);
    $('#count-body').text(tlength+"/500");
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#body').val((tval).substring(0, tlength - 1));
        return false;
    }
  });
  
  $('#telephone').on('change', function(){

    var phoneno1 = /^\d{10}$/;

    var phoneno2 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    var phoneno3 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{2})[-. ]?([0-9]{2})$/;

      var inputtxt = $('#telephone').val();

    if($('#telephone').val().match(phoneno1) || $('#telephone').val().match(phoneno2) || $('#telephone').val().match(phoneno3)){
      console.log("si");
      return true;
    } else {
      console.log("no");
      alert("El número de celular debe coincidir\nEjemplo: 123-456-7890");
      return false;
    }


  });


  $('#loading').hide();
  $('#send').hide();
  $('#miss').hide();

  $('#sendEmail').on('click', function(){

    if($('#name').val() != '' && $('#email').val() != '' && $('#telephone').val() != '' && $('#body').val() != ''){
      var body = $('#body').val();
      body+="\n   ";
      body+= "Nombre:  ";
      body+= $('#name').val();
      body+= "\n   ";
      body+= "Email:  ";
      body+= $('#email').val();
      body+= "\n   ";
      body+= "Telefono:  "
      body+= $('#telephone').val();

      Email.send(
        $('#loading').show(), {
        Host : "mail.kecomer.com.mx",
        Username : "correo@kecomer.com.mx",
        Password : "ERROR#401@KECOMER%2022%SMTP",
        To : 'comercial@kecomer.com.mx',
        From : "correo@kecomer.com.mx",
        Subject : $('#subject').val(),
        Body : body
        
      }
      ).then(
        console.log("Va"),
        //message => alert(message),
        //$('#loading').show(),
        $('#send').show(),
        $('#miss').hide()
      );
    }
    else{
      $('#send').hide();
      $('#miss').show();
    }

    /*
    Email.send({
    Host : "smtp.kecomer.com.mx",
    Username : "correo@kecomer.com.mx",
    Password : "ERROR#401@KECOMER%2022%SMTP",
    To : 'comercial@kecomer.com.mx',
    From : "correo@kecomer.com.mx",
    Subject : $('#subject').val(),
    Body : body
    }).then(
      alert("Correo enviado");
    );
    */

  });

});
