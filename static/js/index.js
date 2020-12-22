$(document).ready(function(){
    /*
    var url = 'http://10.0.0.2/jauservice/index.php/';
    var url = 'https://www.jauservice.com/index.php/';
    */
   var url = 'http://localhost/jauservice/index.php/';

   
    $('.go-services').click(function(){
       $(location).attr("href", url+'welcome/services');
    });
    
    $('.provide-services').click(function(){
        $(location).attr("href", url+'welcome/provider');
    });

    $('.trusted-people').click(function(){
        $(location).attr("href", url+'welcome/trusted');
    });
    
});

