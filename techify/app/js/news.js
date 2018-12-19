
var movee = 9;
var mv = 1;
var working =0;
var long = 0; var lat = 0;
var getloc = 0;
//13 enter 37 left
function myFunction(e) {


       var ev = e || window.event;
       var key = 0;
       key  = (e.keyCode ? e.keyCode : e.which);

       if(key==37){
         window.location="dashboard.html";
       }

       if(key==13){
         window.location="addinfo.html";
       }

  }



  function fetchlist(){
    //getLocation();
    var uid = 0;
    //alert("ok");
    //alert(lat+" "+long);

      $.ajax({
              type : 'POST',
              url : 'http://localhost/techify/news.php',
              data :  {'type': 'fetchnews','uid':uid},
              success : function(data){
                //alert(data);
                $('.newslist').html(data);
              }
          });
  }

  function deleteitem(id){

      $.ajax({
              type : 'post',
              url : 'http://localhost/techify/news.php',
              data :  {'type': 'deleteitem','id':id},
              success : function(data){
                fetchlist();
              }
          });

  }


  fetchlist();

if(localStorage.getItem("userid")==null){
  window.location = "index.html";
}
