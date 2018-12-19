<?php
    include "../connect.php";
    $userid=1;

    $ty = $_POST['type'];
    if($ty=="searchkey"){

      $out = '';
      $keyword = $_POST['keyword'];
      $query = "SELECT * from forum_questions  WHERE questions LIKE '%".$keyword."%' order by time DESC LIMIT 10";
      $result = mysqli_query($conn,$query);
      $num_rows = mysqli_num_rows($result);
      while($row = mysqli_fetch_array($result)){
           $pid = $row['forum_id'];
           $ques = $row['questions'];
           $out.= "<li class='list-group-item'><a href='ques.php?qid=".$pid."'>".$ques."</a></li>";
      }
      echo $out;
    }
    if($ty=="addques"){

      $ques = $_POST['question'];
      $userid = $_POST['userid'];
      if(mysqli_query($conn,"INSERT INTO forum_questions (user_id,questions) values('$userid','$ques')"))echo 1; else echo 0;

    }
    if($ty=="loadques"){

    $out = '';
      $query = "SELECT * from forum_questions order by time DESC LIMIT 10";

        $result = mysqli_query($conn,$query);
        $num_rows = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
             $pid = $row['forum_id'];
             $ques = $row['questions'];
             $out.= "<li class='list-group-item'><a href='ques.php?qid=".$pid."'>".$ques."</a></li>";
        }

        echo $out;

    }
    

?>
