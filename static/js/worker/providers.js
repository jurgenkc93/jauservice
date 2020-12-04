$(document).ready(function(){
    /*
    var url = "http://localhost/jauservice/index.php/";
    */
   var url = "http://www.jauservice.com/index.php/";

    var data = {
        "phone" : $('#phone').val()
    };

    var jsonData = JSON.stringify(data);

    $.ajax({
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        data: jsonData,
        url: url+"api/Users/getAllProviders",
        type: "post",
        success: function(data) {
            $('#table').DataTable({
                data: data,
                columns: [
                    {'data' : 'phone'},
                    {'data' : 'name'},
                    {'data' : 'surname'},
                    {'data' : 'status'},
                    {'data' : 'date_started'},
                    {'data' : 'next_renew'},
                    {
                        'data' : 'null',
                        'orderable' : false,
                        'render' : function(data, type, row){
                            return '<i class="far fa-address-card mx-3 hover-pointer" title="Editar" id="' + row.phone + '"></i><i class="far fa-sticky-note mx-3" title="Editar" id="' + row.phone + '"></i><i class="fas fa-list mx-3" title="Roles" id="'+ row.phone + '"></i><i class="far fa-trash-alt mx-3" title="Eliminar" id="'+ row.phone + '"></i>';
                        }
                    }
                    
                ]
            });
        },
        error: function(xhr) {
            console.log(xhr);
        }
      
    });

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

