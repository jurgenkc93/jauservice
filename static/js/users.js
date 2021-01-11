
/*
var url = "http://localhost/kecomer-interfaz/user/";
var url = "http://localhost/jauservice/user/";
*/
var url = document.getElementById('base-url').value;

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