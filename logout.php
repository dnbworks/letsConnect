<?php
    if(isset($_COOKIE['user_id'])){
        setcookie('user_id', '', time() - 3600);
        setcookie('username', '', time() - 3600);
        header('Location:' . 'http://localhost/letsConnect/index.php');
    }
?>