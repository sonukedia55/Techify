function searchform(){
  var keyword = $('.searchtext').val();
  $.ajax({
          type : 'post',
          url : 'http://localhost/techify/forum/php/forum.php',
          data :  {'type': 'searchkey','keyword':keyword},
          success : function(data){
            $('.showsearch').html(data);
          }
      });

}

function loadques(){
  $.ajax({
          type : 'post',
          url : 'http://localhost/techify/forum/php/forum.php',
          data :  {'type': 'loadques'},
          success : function(data){
            $('.showsearch').html(data);
          }
      });
}

loadques();

function addques(){
  var newq = $('.newques').val();
  $.ajax({
          type : 'post',
          url : 'http://localhost/techify/forum/php/forum.php',
          data :  {'type': 'addques','userid':1},
          success : function(data){
            if(data==1) alert("Added!");
            $('.newques').val('');
          }
      });
}
