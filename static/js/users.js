$(document).ready(function(){
    

    $.ajax({
		contentType: 'application/json; charset=utf-8',
        dataType: 'json',
		url: "http:///api.kecomer.com.mx/index.php/Users/getAll",
        type: "get",	
        success: function(data) {

            $('#table').DataTable({
                data: data,
                columns: [
                    {'data' : 'username'},
                    {'data' : 'name'},
                    {'data' : 'surname'},
                    {'data' : 'id_city'},
                    {
                        'data' : 'null',
                        'orderable' : false,
                        'render' : function(data, type, row){
                            return '<i class="far fa-sticky-note mx-3" title="Editar" onclick="editUser(this)" id="' + row.username + '"></i><i class="far fa-trash-alt mx-3" title="Eliminar" onClick="deleteUser(this)" id="' + row.username + '"></i>';
                        }
                    }
                    
                ]

            });
		},
		error: function(xhr) {
			console.log(xhr);
		}
      });

      $('.fa-file-signature').click(function(){
          console.log( "Editar" );
          console.log( $(this).val() );
      });

    
});

var url = "http://localhost/kecomer-interfaz/index.php/user/";
//var url = "http://interfaz.kecomer.com.mx/index.php/user/";

function createUser(){
    url = url+"create";
    $(location).attr("href", url);
}

function editUser(i){
    console.log('Editando');
	url = url+"edit/";
    console.log(i);
    console.log(i.id);
    $(location).attr("href", url+i.id);
}
function deleteUser(i){
    console.log("Patos");
    console.log(i.id);
}