<?php 

require_once("../functions/startsession.php");

require_once("../functions/connectvars.php"); 

if(!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="login.php"> Login</a> to access this page</p>';
    exit();
}

$dbc = mysqli_connect(host, user, pwd, database ) or die("couldn't connect to database");


// only look for a mismatch if the user has answers questionnaire responds

$fetch = "SELECT * FROM mismatch_response WHERE user_id = '"  . $_SESSION['user_id'] . "'";

$data = mysqli_query($dbc, $fetch);

if(mysqli_num_rows($data) != 0){
    $query = "SELECT mr.response_id, mr.topic_id, mr.response, mt.name AS topic_name FROM mismatch_response AS mr INNER JOIN mismatch_topic AS mt USING (topic_id) WHERE mr.user_id = '" . $_SESSION['user_id'] . "'";

    $data = mysqli_query($dbc, $query);

    $user_responses = array();

    while($row = mysqli_fetch_array($data)){
        array_push($user_responses, $row);
    }

    // 

    $mismatch_score = 0;
    $mismatch_user_id = -1;
    $mismatch_topics = array();

    // select users who aren't logged in
    $query2 = "SELECT user_id FROM mismatch_users WHERE user_id != '". $_SESSION['user_id'] . "'";

    $data2 = mysqli_query($dbc,  $query2);

    // var_dump( $data2);

   

    while($row2 = mysqli_fetch_array($data2)){

       
        $query3 = "SELECT response_id, topic_id, response FROM mismatch_response WHERE user_id = '" . $row2['user_id'] . "'";

    
      
        $data3 = mysqli_query($dbc,  $query3);
        var_dump($data3);

        $mismatch_responses = array();

        while($row3 = mysqli_fetch_array($data3)){
            array_push($mismatch_responses, $row3);
        }

        $score = 0;
        $topics = array();

        // var_dump($row3);

    /*
        for ($i=0; $i < count($user_responses); $i++) { 
            if(((int)$user_responses[$i]['response'] + (int)$mismatch_responses[$i]['response']) == 3){
                $score += 1;
        
                array_push($topics, $user_responses[$i]['topic_name']);
            }
    
        }

        if($score > $mismatch_score){

            // we found a better mismatch, so update the mismatch seach results

            $mismatch_score = $score;

            $mismatch_user_id = $row3['user_id'];
            $mismatch_topics = array_slice($topics, 0);

        }

        */
        
    }
    /*

    if($mismatch_user_id != 1){
        $query = "SELECT username, first_name, last_name, city, state, picture FROM mismatch_users WHERE user_id = '$mismatch_user_id'";

        $data = mysqli_query($dbc,  $query);

        if(mysqli_num_rows($data) == 1){

            $row = mysqli_fetch_array($data);

            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-12 col-md-6 col-lg-6">';
            echo '<div class="d-flex">';

            echo '<div>';
            echo '<p>' . $row['first_name'] . ' ' . $row['last_name']  .'</p>';
            echo '<p>' . $row['city'] . ' ' . $row['state'] . '</p>';
            echo '</div>';


            echo '<div>';
            echo '<img src="' . $row['picture'] . '" alt="profile" width="100px"/>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }

    }

*/



    
}



// var_dump($user_responses);