/*
var url = 'http://10.0.0.2/jauservice/';
var url = 'https://www.jauservice.com/';
var url = 'http://localhost/jauservice/';

function findCategory(id){
    $(location).attr("href", url+'welcome/services/'+id);
}
*/
$(document).ready(function(){
    /*
    var url = 'http://10.0.0.2/jauservice/';
    var url = 'http://localhost/jauservice/';
    */
   var url = document.getElementById('base-url').value;

   
    $('.role').click(function(){
        var id = this.id;
       $(location).attr("href", url+'service/providers/'+id);
    });
    

    $('.go-services').click(function(){
       $(location).attr("href", url+'welcome/services');
    });
    
    $('.provide-services').click(function(){
        $(location).attr("href", url+'welcome/contact');
    });

    /*
    $('.trusted-people').click(function(){
        $(location).attr("href", url+'welcome/trusted');
    });*/
    
});

