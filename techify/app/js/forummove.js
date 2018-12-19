
var movee = 8;
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
