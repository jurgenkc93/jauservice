$(document).ready(function(){
    /*
    var url = "http://localhost/jauservice/";
    */
   var url = "http://www.jauservice.com/";

    $('#table').DataTable();


    $('#table').on('click', 'tbody tr .fa-sticky-note', function(){
        $(location).attr("href", url+'provider/edit/'+this.id);
    });

    $('#table').on('click', 'tbody tr .fa-list', function(){
        $(location).attr("href", url+'provider/roles/'+this.id);
    });

    $('#table').on('click', 'tbody tr .fa-address-card', function(){
        $(location).attr("href", url+'provider/provider/'+this.id);
    });
    

});

