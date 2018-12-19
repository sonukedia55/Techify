<?php

include "connect.php";

// session_start();

$userid = 1;
$postid = $_POST['postid'];
$type = $_POST['type'];
$qid = $_POST['qid'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM upvoters WHERE answer_id=".$postid." and user_id=".$userid;

$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

$type1 = -1;
// Checking user status
$status_query = "SELECT vote FROM upvoters WHERE user_id=".$userid." and answer_id=".$postid;
$status_result = mysqli_query($conn,$status_query);
$count_status = mysqli_num_rows($status_result);


if($count_status > 0){
	$status_row = mysqli_fetch_array($status_result);
    $type1 = $status_row['vote'];
}


if($count == 0){
    $insertquery = "INSERT INTO upvoters(user_id,answer_id,vote) values(".$userid.",".$postid.",".$type.")";
    mysqli_query($conn,$insertquery);
    if ($type == 1) {
    	$query = "UPDATE forum_answers SET upvote_count = upvote_count + 1 where answer_id=" . $postid;
    	mysqli_query($conn,$query);
    }
    else{
    	$query = "UPDATE forum_answers SET downvote_count = downvote_count + 1 where answer_id=" . $postid;
    	mysqli_query($conn,$query);
    }
}else {
    $updatequery = "UPDATE upvoters SET vote=" . $type . " where user_id=" . $userid . " and answer_id=" . $postid;
    mysqli_query($conn,$updatequery);
    if ($type == 1 && $type1 != 1) {
    	$query = "UPDATE forum_answers SET upvote_count = upvote_count + 1 where answer_id=" . $postid;
    	mysqli_query($conn,$query);
    	$query = "UPDATE forum_answers SET downvote_count = downvote_count - 1 where answer_id=" . $postid;
    	mysqli_query($conn,$query);
    }
    else if($type==2 && $type1 != 2){
    	$query = "UPDATE forum_answers SET downvote_count = downvote_count + 1 where answer_id=" . $postid;
    	mysqli_query($conn,$query);
    	$query = "UPDATE forum_answers SET upvote_count = upvote_count - 1 where answer_id=" . $postid;
    	mysqli_query($conn,$query);
    }
}

// count numbers of like and unlike in post
$query = "SELECT * FROM forum_answers where answer_id=".$postid;
$result = mysqli_query($conn,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['upvote_count'];
$totalUnlikes = $fetchlikes['downvote_count'];


$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);

?>
