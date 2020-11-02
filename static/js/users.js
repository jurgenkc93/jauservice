
/*
var url = "http://localhost/kecomer-interfaz/index.php/user/";
var url = "http://localhost/jauservice/index.php/user/";
*/
var url = 'https://www.jauservice.com/index.php/';

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