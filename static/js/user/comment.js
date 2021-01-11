$(document).ready(function(){
    
    /*
    var url = 'http://10.0.0.2/jauservice/';
    var url = 'http://localhost/jauservice/';
    */
   var url = document.getElementById('base-url').value;
   

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
        $('#start-text').text(i);
  });

});

