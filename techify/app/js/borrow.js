
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
         window.location="addborrow.html";
       }

  }



  function fetchlist(){
    //getLocation();
    var uid = 0;
    //alert("ok");
    //alert(lat+" "+long);

      $.ajax({
              type : 'POST',
              url : 'http://localhost/techify/rent2.php',
              data :  {'type': 'take','t_lng':long,'t_lat':lat,'user_id':uid},
              success : function(data){
                //alert(data);
                $('.borrowlist').html(data);
              }
          });
  }

  function deleteitem(id){

      $.ajax({
              type : 'post',
              url : 'http://localhost/techify/rent2.php',
              data :  {'type': 'deleteitem','rent_id':id},
              success : function(data){
                fetchlist();
              }
          });

  }



function getLocation() {
  if(getloc==0){
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }
}

function showPosition(position) {
  long = position.coords.longitude;
  lat = position.coords.latitude;
  getloc = 1;
  fetchlist();
}
if(localStorage.getItem("userid")==null){
  window.location = "index.html";
}
getLocation();
