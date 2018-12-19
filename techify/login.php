<?php

$ty = $_POST['phone'];
//echo $ty;
include 'connect.php';

      $query4 = mysqli_query($dcon, "SELECT * from user where phone_number = '$ty'");
      while($rg = mysqli_fetch_array($query4)){
          echo $rg['user_id'];
          break;
      }
?>
