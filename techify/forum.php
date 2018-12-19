<?php

$ty = $_GET['typep'];
include "connect.php";

/*if($ty=="fetanswers"){

        $rid = 0;
        $evarr = array();
        $uname = $_GET['type'];
        $query3=mysqli_query($dcon,"SELECT * from forum_answer where forum_id = ");
        while($row3=mysqli_fetch_assoc($query3))
        {
          $rid = $row3['id'];
          $ea = $row3['about'];
          $rc=0;$tr=0;$rate=0;
            $ddg = mysqli_query($dcon, "SELECT uid,val from event_sc_rate where eid = '$rid'"); {
                  while($rg = mysqli_fetch_array($ddg)){
                    if($rg['uid']==$uid)
                      $rate = $rg['val'];
                    $rc++;$tr+=$rg['val'];
                  }
                }
            if($rc==0)$tr=0;else{$tr=sprintf('%0.1f', ($tr)/($rc));}
          array_push($evarr,array("event_id"=>$rid,"event"=>$ea,"start"=>datetime($es),"end"=>datetime($ee),"rating"=>$rc,"rated"=>$rate));
        }

        echo json_encode($evarr);

    }*/
    echo 2;
    echo $ty;


if($ty =="upvote"){
    echo 1;
    $userid = $_GET['user_id'];
    $answerid = $_GET['answer_id'];
    $total_upvote = 0;
    $flag = 0;
    $query4 = mysqli_query($dcon, "SELECT * from upvoters where answer_id = '$answerid' and user_id = '$userid'");
    while($rg = mysqli_fetch_array($query4)){
        $flag++;
        $total_upvote = $rg['upvote_count'];
        break;
    }
    echo $flag;
        if($flag == 0){
            $query41 = mysqli_query($dcon, "UPDATE forum_answers set upvote_count = upvote_count + 1 where answer_id = '$answerid'");
            $total_upvote++;
            mysqli_query($dcon, "INSERT INTO upvoters VALUES (NULL,'$answerid','$userid',1)");
        }
        else if($flag != 0){
            $query42 =  mysqli_query($dcon, "SELECT * from upvoters where answer_id = '$answerid' and user_id = '$userid' and vote = 0");
            $query43 = mysqli_query($dcon, "SELECT * from upvoters where answer_id = '$answerid' and user_id = '$userid' and vote = 1");
            $flag2 = 0;
            $flag3 = 0;
            while($rg = mysqli_fetch_array($query42)){
                $flag2++;
                break;
            }
            while($rg = mysqli_fetch_array($query43)){
                $flag3++;
                break;
            }
            if($flag2 == 0){
                //mysqli_query($dcon, "UPDATE forum_answers set upvote_count = upvote_count + 1 where answer_id = '$answerid'");
                //total_upvote++;
                //mysqli_query($dcon, "INSERT INTO upvoters VALUES (NULL,'$answerid','$userid',1)");
            }
            else if($flag2 != 0){
                mysqli_query($dcon, "DELETE FROM forum_answers where answer_id = '$answerid' and user_id = '$userid' and vote = 0");
                mysqli_query($dcon, "UPDATE forum_answers set upvote_count = upvote_count + 1 where answer_id = '$answerid'");
                total_upvote++;
                mysqli_query($dcon, "UPDATE forum_answers set downvote_count = downvote_count - 1 where answer_id = '$answerid'");
                mysqli_query($dcon, "INSERT INTO upvoters VALUES (NULL,'$answerid','$userid',1)");
            }
        }

        echo $total_upvote;

}

else if($ty == "downvote"){
    $userid = $_GET['user_id'];
    $answerid = $_GET['answer_id'];
    $flag = 0;
    $total_upvote = 0;
    $query5 = mysqli_query($dcon, "SELECT * from upvoters where answer_id = '$answerid' and user_id = '$userid'");
    while($rg = mysqli_fetch_array($query5)){
        $flag++;
        $total_upvote = $rg['upvote_count'];
        break;
    }

        if($flag == 0){
            $query51 = mysqli_query($dcon, "UPDATE forum_answers set downvote_count = downvote_count + 1 where answer_id = '$answerid'");
            $total_upvote++;
            mysqli_query($dcon, "INSERT INTO upvoters VALUES (NULL,'$answerid','$userid',0)");
        }

        else if($flag != 0){
            $query52 =  mysqli_query($dcon, "SELECT * from upvoters where answer_id = '$answerid' and user_id = '$userid' and vote = 1");
            $flag2 = 0;
            while($rg = mysqli_fetch_array($query52)){
                $flag2++;
                break;
            }
            if($flag2 == 0){
                //mysqli_query($dcon, "UPDATE forum_answers set downvote_count = downvote_count + 1 where answer_id = '$answerid'");
                //mysqli_query($dcon, "INSERT INTO upvoters VALUES (NULL,'$answerid','$userid',0)");
            }
            else if($flag2 != 0){
                $total_upvote++;
                mysqli_query($dcon, "UPDATE forum_answers set upvote_count = upvote_count - 1 where answer_id = '$answerid'");
                mysqli_query($dcon, "DELETE FROM forum_answers where answer_id = '$answerid' and user_id = '$userid' and vote = 1");
                mysqli_query($dcon, "UPDATE forum_answers set downvote_count = downvote_count + 1 where answer_id = '$answerid'");
                mysqli_query($dcon, "INSERT INTO upvoters VALUES (NULL,'$answerid','$userid',0)");
            }
        }
}

else if($ty == "deleteanswer"){
    $userid = $_GET['user_id'];
    $answerid = $_GET['answer_id'];
    mysqli_query($dcon, "DELETE FROM forum_answers where answer_id = '$answerid'");
    mysqli_query($dcon, "DELETE FROM upvoters where answer_id = '$answerid'");
}

?>
