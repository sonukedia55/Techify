
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
           alert("Done");
         }
       }

     }
