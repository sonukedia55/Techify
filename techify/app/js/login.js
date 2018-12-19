
var movee = new Array(".phonebox",".logobutton");
var mv = 1;
//13 enter 37 left
function myFunction(e) {
       var ev = e || window.event;
       var key  = (e.keyCode ? e.keyCode : e.which);

       if(key==38){
         mv--;
         if(mv==0)mv= movee.length;
       }
       if(key==40){
         mv++;
         if(mv>movee.length)mv=1;
       }
       $(movee[mv-1]).focus();
       //alert(mv);
       if(key==13){
         if(mv==movee.length){
           login();
         }
       }

     }


     function login(){

       var phone = $('.phonebox').val();

         $.ajax({
                 type : 'post',
                 url : 'http://localhost/techify/login.php',
                 data :  {'phone': phone},
                 success : function(data){
                   if(data>0){
                     localStorage.setItem("userid", data);
                     window.location = "dashboard.html";
                   }else{
                     alert('Invalid Login');
                   }
                 }
             });

     }
localStorage.removeItem("userid");
