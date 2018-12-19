<?php
include "../connect.php";

  $ty = $_POST['type'];

  if($ty=="sendanswer"){
    $ans = $_POST['answer'];
    $qid = $_POST['qid'];
    $query = "INSERT INTO forum_answers (forum_id,answer,upvote_count,downvote_count) values(".$qid.",'".$ans."',0,0)";
    if(mysqli_query($conn,$query))echo 1; else echo 0;
  }

  if($ty=="fetchanswers"){


  $out = '';

    $query = "select * from forum_questions where forum_id=".$qid;
    $result = mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $out.= "<h2>".$row['questions']."</h2>";
    $query = "select count(forum_id) as rec_count from forum_answers where forum_id=".$qid;
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $rec_count = $row[rec_count];

    $query = "SELECT * FROM forum_answers where forum_id=".$qid." ORDER BY (upvote_count - downvote_count) DESC ";

    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
        $postid = $row['answer_id'];
        $qid = $_GET['qid'];
        // $title = $row['Title'];
        $content = $row['answer'];
        $type = -1;
        // Checking user status
        $status_query = "SELECT vote FROM upvoters WHERE user_id=".$userid." and answer_id=".$postid;
        $status_result = mysqli_query($conn,$status_query);
        $count_status = mysqli_num_rows($status_result);


        if($count_status > 0){
            $status_row = mysqli_fetch_array($status_result);
            $type = $status_row['vote'];
        }

        // Count post total likes and unlikes
        $total_likes = $row['upvote_count'];
        $total_unlikes = $row['downvote_count'];

        $out . '<div class="post">
            <div class="post-text">'.$content.'
            </div>
            <div class="post-action">


                <input type="button" value="Like" id="like_'.$postid.'_'.$qid.'" class="like" style="';
                if($type == 1){ $out.= "color: #ffa449;"; }
                $out.='" />&nbsp;(<span id="likes_'.$postid.'_'.$qid.'">'.$total_likes.'</span>)&nbsp;

                <input type="button" value="Unlike" id="unlike_'.$postid.'_'.$qid.'" class="unlike" style="';

                if($type == 2){ $out.=' "color: #ffa449;"'; }
                $out .='" />&nbsp;(<span id="unlikes_'.$postid.'_'.$qid.'">'.$total_unlikes.'</span>);

            </div>
        </div>';
      }

      echo $out;
    }
 ?>
