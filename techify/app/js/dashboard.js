
var movee = [[".i1",".i2"],[".i3",".i4"]];
var fun = [["Forum","Borrow"],["Information","Enquiry"]];
var mvi = 1;
var mvj = 1;
//13 enter 37 left
function changecolor(i,j){
  $(".iconn img").css({'border-color':'white','-webkit-filter':'drop-shadow(0px 0px 1px white)'});
  $(".iconn h6").css('color','white');
  $(movee[i-1][j-1]+" img").css({'border-color':'#f7dc6f','-webkit-filter':'drop-shadow(0px 0px 4px #f7dc6f)'});
  $(movee[i-1][j-1]+" h6").css('color','#f7dc6f');
}
function myFunction(e) {
       var ev = e || window.event;
       var key  = (e.keyCode ? e.keyCode : e.which);

       if(key==37){
         mvj--;
         if(mvj==0)mvj=movee.length;
       }
       if(key==38){
         mvi--;
         if(mvi==0)mvi= movee.length;
       }
       if(key==39){
         mvj++;
         if(mvj>movee.length)mvj=1;
       }
       if(key==40){
         mvi++;
         if(mvi>movee.length)mvi=1;
       }
       //alert(mvi+" "+mvj+" "+movee.length);
       changecolor(mvi,mvj);
       //alert(mv);
       if(key==13){
           var g = fun[mvi-1][mvj-1];
           if(g=="Borrow"){
             window.location="borrow.html";
           }
           if(g=="Information"){
             window.location="news.html";
           }
           if(g=="Forum"){
             window.location="forum.html";
           }
       }

     }

if(localStorage.getItem("userid")==null){
  window.location = "index.html";
}
