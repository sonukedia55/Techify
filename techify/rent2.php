<?php
header("Access-Control-Allow-Origin: *");

$ty = $_POST['type'];

 //var_dump($_POST['type']);

include 'connect.php';

  //echo 1;
//  echo $ty;
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit , $decimals) {

	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));


	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
	}
	return round($distance, $decimals);
}

//echo 5;
//echo $ty;
if($ty == "give"){
   // echo 6;
    $userid = $_POST['user_id'];
    $machinename = $_POST['machine_name'];
    $picurl ='';
    //echo $ty;
    $rent = $_POST['rent'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $u_name = $_POST['user_name'];
    $dat1 = $_POST['dat1'];
    $dat2 = $_POST['dat2'];

    echo $userid.$machinename.$rent.$lat.$lng.$u_name.$dat1.$dat2;

    $r =  mysqli_query($dcon, "INSERT INTO give_on_rent VALUES (NULL,'$userid','$u_name','$machinename','$picurl','$rent','$lat', '$lng', 1, '$dat1', '$dat2')");
    $filename = 0;
    $query0 = mysqli_query($dcon, "SELECT * FROM give_on_rent where user_id = '$userid' and machine_name = '$machinename' and lat = '$lat' and lng = '$lng' and rent = '$rent'");
    //echo 7;
    while($rg = mysqli_fetch_array($query0)){
        $filename =  $rg['rent_id'];
       // echo 8;
    }

   // $filename = $_POST['filename'];

      $target_directory = "fileishere/";
      $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
      $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $newfilename = $target_directory.$filename.".jpg";

      //move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);   // tmp_name is the file temprory stored in the server

      //Now to check if uploaded or not

      if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) echo 1;
      else echo 0;


}

if($ty == "take"){
    //$takerid = $_REQUEST['taker_id'];
    $t_lat = $_POST['t_lat'];
    $t_lng = $_POST['t_lng'];
    $uiid=0;
    if(isset($_POST['user_id']))
      $uiid = $_POST['user_id'];
    $out = '';

    $arr = array();

    if($uiid==0)$qry = "SELECT * from give_on_rent";
    else $qry = "SELECT * from give_on_rent where user_id= ".$uiid;
    $query5 = mysqli_query($dcon, $qry);
    while($rg = mysqli_fetch_array($query5)){

        $distance = distanceCalculation($rg['lat'], $rg['lng'] , $t_lat, $t_lng, 'km' , 2);
        $uid = $rg['user_id'];
        $query = mysqli_query($dcon, "SELECT * from user where user_id = '$uid'");
        while($rg5 = mysqli_fetch_array($query)){
            $nm = $rg5['user_name'];
            $pn = $rg5['phone_number'];
        }

        //echo $distance." ";
        if($distance < 30){
          $out.='<div class="row borrow">

          <h6>'.$nm.' ('.$pn.') - '.$rg['machine_name'].'</h6>
          <h7>Distance : '.$distance.' km</h7><br>
          <h7>Avalabile from '.$rg['fro'].' to '.$rg['upto'].'</h7><br>
          <h7>Expected Price - &#x20B9; '.$rg['rent'].' / day </h7><br><br>
          <p>'.$rg['user_name'].'</p><img src="http://localhost/techify/fileishere/'.$rg['rent_id'].'.jpg"/>';
          if($uid==$uiid){
            $out.='<button class="btn btn-danger f8" onclick="deleteitem('.$rg['rent_id'].')">Remove</button>';
          }

          $out.= '</div>';


        }


    }
    echo $out;

}

if($ty == "deleteitem"){
    $userid = $_POST['rent_id'];
    mysqli_query($dcon, "DELETE FROM give_on_rent where rent_id = '$userid'");
}


?>
