<?php
header("Access-Control-Allow-Origin: *");

$ty = $_POST['type'];

 //var_dump($_POST['type']);

include "connect.php";


      if($ty == "addinfo"){
         // echo 6;
          $userid = $_POST['userid'];
          $machinename =mysql_real_escape_string($_POST['name']);

          echo $userid.$machinename;

        $r =   mysqli_query($dcon, "INSERT INTO news VALUES (NULL,'$userid','$machinename')");
          $filename = 0;
          $query0 = mysqli_query($dcon, "SELECT * FROM news where uid = '$userid'");
          //echo 7;
          while($rg = mysqli_fetch_array($query0)){
              $filename =  $rg['id'];
             // echo 8;
          }

         // $filename = $_POST['filename'];

            $target_directory = "fileishere2/";
            $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
            $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $newfilename = $target_directory.$filename.".jpg";

            //move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);   // tmp_name is the file temprory stored in the server

            //Now to check if uploaded or not

            if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) echo 1;
            else echo 0;


      }

if($ty == "fetchnews"){

    $out = '';
    $uiid = $_POST['uid'];

    $arr = array();

    if($uiid==0)$qry = "SELECT * from news";
    else $qry = "SELECT * from news where uid= ".$uiid;
    $query5 = mysqli_query($dcon, $qry);
    while($rg = mysqli_fetch_array($query5)){


        $uid = $rg['uid'];
        $query = mysqli_query($dcon, "SELECT * from user where user_id = '$uid'");
        while($rg5 = mysqli_fetch_array($query)){
            $nm = $rg5['user_name'];
            $pn = $rg5['phone_number'];
        }


          $out.='<div class="row news">

          <h6>'.$nm.' ('.$pn.')</h6>
          <p>'.$rg['message'].'</p><img src="http://localhost/techify/fileishere2/'.$rg['id'].'.jpg"/>';
          if($uid==$uiid){
            $out.='<button class="btn btn-danger f8" onclick="deleteitem('.$rg['id'].')">Remove</button>';
          }

          $out.= '</div>';

    }
    echo $out;

}

if($ty == "deleteitem"){
    $userid = $_POST['id'];
    mysqli_query($dcon, "DELETE FROM news where id = '$userid'");
}


?>
