/*
var url = 'http://localhost/jauservice/';
*/
var url = document.getElementById('base-url').value;

function findCategory(id){
	$(location).attr("href", url+'service/providers/'+id);
}

function findProvider(id){
	$(location).attr("href", url+'service/provider/'+id);
}
