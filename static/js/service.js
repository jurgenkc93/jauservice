/*
var url = 'http://localhost/jauservice/';
*/
var url = 'http://www.jauservice.com/index.php/';

function findCategory(id){
	$(location).attr("href", url+'index.php/service/providers/'+id);
}

function findProvider(id){
	$(location).attr("href", url+'index.php/service/provider/'+id);
}
