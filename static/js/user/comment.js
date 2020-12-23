$(document).ready(function(){
    
    /*
    var url = 'http://10.0.0.2/jauservice/index.php/';
    var url = 'http://localhost/jauservice/index.php/';
    */
   var url = 'https://www.jauservice.com/index.php/';
   

  $('.star').click(function(){
      var id = this.id
      id = id.split("-");
      for(var i = 0; i <= id[1]; i++){
          document.getElementById("star-"+i).classList.add('fas');
          document.getElementById("star-"+i).classList.remove('far');
        }
        if(i <= 4){
            for(var j = i; j <= 4; j++){
                document.getElementById("star-"+j).classList.add('far');
                document.getElementById("star-"+j).classList.remove('fas');
            }
        }
        $('#ranking').val(i);
  });

});

