
var movee = 5;
var mv = 1;
var working = 0;
//13 enter 37 left
function myFunction(e) {
       var ev = e || window.event;
       var key  = (e.keyCode ? e.keyCode : e.which);

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
         if(mv==3){
           submitborrow();
         }
       }

       if(key==37){
         window.location="news.html";
       }

 }



 function submitborrow(){
   if(working==0){
     $('.f3').html('Adding');
     working = 1;
     var nm = $('.f1').val();

     var file_data = $('.f2').prop('files')[0];
     var form_data = new FormData();
     form_data.append("name",nm);
     form_data.append("type","addinfo");
     form_data.append("file",file_data);
     form_data.append("userid",localStorage.getItem("userid"));
       //Ajax to send file to upload
       $.ajax({
           url: "http://localhost/techify/news.php",

                  type: 'POST',
                   contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                   processData: false,
                  data: form_data,

               success:function(data){
                 //alert(data);
                 alert("Successful");
                 $('.f3').html('Add');
                 $('.f1').val('');
                 $('.f2').val('');
                 fetchlist();
                 working = 0;
               }
         });

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
