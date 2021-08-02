<?php 

require_once("../functions/startsession.php");

require_once("../functions/connectvars.php"); 

if(!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="login.php"> Login</a> to access this page</p>';
    exit();
}

$dbc = mysqli_connect(host, user, pwd, database ) or die("couldn't connect to database");

$query = "SELECT mr.response_id, mr.topic_id, mr.response, mt.name AS topic_name FROM mismatch_response AS mr INNER JOIN mismatch_topic AS mt USING (topic_id) WHERE mr.user_id = '" . $_SESSION['user_id'] . "'";

$data = mysqli_query($dbc, $query);

$user_responses = array();

while($row = mysqli_fetch_array($data)){
    array_push($user_responses, $row);
}

$mismatch_score = 0;
$mismatch_user_id = 0;
$mismatch_topics = array();

for ($i=0; $i < count($user_responses); $i++) { 

    # code...
}

// var_dump($user_responses);