   

var symbols = {
    hash:"#",
    curlybackets:"{}",
    anglebrackets:"[]",
    or:"||"
}

<?php
    require_once('connectivity.php');
    require_once('variables.php');
?>

var localhost_password = "hfhpbqX4w7dKPE16";

"INSERT INTO `mismatch_users`(`username`, `password`, `join_date`, `first_name`, `last_name`, `gender`, `birthdate`, `city`, `state`) VALUES ('dooyong', SHA('nsaako'), NOW(),'Nuelan','Felix','F','2001-06-28','Antipolo','Rizal')";


UPDATE `mismatch_users` SET `first_name`= '',`last_name`= '', `gender`= '', `birthdate`= '', `city`= '',`state`= '', `picture`= '' WHERE user_id = '';