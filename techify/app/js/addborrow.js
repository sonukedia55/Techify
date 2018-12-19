
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

       if(key==38){
         if(mv>1)
         mv--;
         //if(mv==0)mv= movee;
       }
       if(key==40){
         if(mv<movee)
         mv++;
         //if(mv>movee)mv=1;
       }
       $('.f'+mv).focus();
       //alert(mv);
       if(key==13){
         if(mv==7){
           submitborrow();
         }
       }
       //alert(key);
       if(key==37){
         window.location="borrow.html";
       }

  }

  function submitborrow(){
    if(working==0){
      getLocation();
      if(long&&lat){
        $('.f7').html('Adding');
        working = 1;
        var nm = $('.f1').val();
        var des = $('.f2').val();
        var dat1 = $('.f3').val();
        var dat2 = $('.f4').val();
        var exp = $('.f5').val();

        var file_data = $('.f6').prop('files')[0];
        var form_data = new FormData();
        form_data.append("machine_name",nm);
        form_data.append("user_name",des);
        form_data.append("dat1",dat1);
        form_data.append("type","give");
        form_data.append("dat2",dat2);
        form_data.append("rent",exp);
        form_data.append("user_id",localStorage.getItem("userid"));
        form_data.append("lng",long);

        form_data.append("file",file_data);
        form_data.append("lat",lat);
        //Ajax to send file to upload
        $.ajax({
            url: "http://localhost/techify/rent2.php",

                   type: 'POST',
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false,
                   data: form_data,

                success:function(data){
                  //alert(data);
                  alert("Successful");
                  $('.f7').html('Add');
                  //fetchlist();
                  working = 0;
                }
          });

        }
    }
  }

  function fetchlist(){
    //getLocation();
    var uid = localStorage.getItem("userid");
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
