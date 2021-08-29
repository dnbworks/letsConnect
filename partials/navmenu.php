<?php
         
if(isset($_SESSION['user_id'])){

?> 

<ul class="nav nav-tabs">
<?php
    if ($pageIndex == 2) {
?>    
    <li class="nav-item">
        <a href="../index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item">
        <a href="./view-profile.php?<?php echo SID; ?>" class="nav-link active">View Profile <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a href="./edit-profile.php?<?php echo SID; ?>" class="nav-link">Edit Profile</a>
    </li>
    <li class="nav-item">
        <a href="./Questionaire.php?<?php echo SID; ?>" class="nav-link">Questionaire</a>
    </li>
    <li class="nav-item">
        <a href="./my-match.php?<?php echo SID; ?>" class="nav-link">my match </a>
    </li>
    <li class="nav-item">
        <a href="./logout.php" class="nav-link">Log out <?php echo $_SESSION['username']; ?> </a>
    </li>
<?php
    } elseif($pageIndex == 3){    
?>
    <li class="nav-item">
        <a href="../index.php" class="nav-link">Home </a>
    </li>
    <li class="nav-item">
        <a href="./view-profile.php?<?php echo SID; ?>" class="nav-link">View Profile</a>
    </li>
    <li class="nav-item">
        <a href="./edit-profile.php?<?php echo SID; ?>" class="nav-link active">Edit Profile <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a href="./Questionaire.php?<?php echo SID; ?>" class="nav-link">Questionaire</a>
    </li>
    <li class="nav-item">
        <a href="./my-match.php?<?php echo SID; ?>" class="nav-link">my match </a>
    </li>
    <li class="nav-item">
        <a href="./logout.php" class="nav-link">Log out <?php echo $_SESSION['username']; ?> </a>
    </li>

<?php
    } elseif($pageIndex == 4){    
?>
    <li class="nav-item">
        <a href="../index.php" class="nav-link">Home </a>
    </li>
    <li class="nav-item">
        <a href="./view-profile.php?<?php echo SID; ?>" class="nav-link">View Profile</a>
    </li>
    <li class="nav-item">
        <a href="./edit-profile.php?<?php echo SID; ?>" class="nav-link">Edit Profile </a>
    </li>
    <li class="nav-item">
        <a href="./Questionaire.php?<?php echo SID; ?>" class="nav-link active">Questionaire <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a href="./my-match.php?<?php echo SID; ?>" class="nav-link">my match </a>
    </li>
    <li class="nav-item">
        <a href="./logout.php" class="nav-link">Log out <?php echo $_SESSION['username']; ?> </a>
    </li>
<?php
    } elseif($pageIndex == 5){    
?>
  <li class="nav-item">
        <a href="../index.php" class="nav-link">Home </a>
    </li>
    <li class="nav-item">
        <a href="./view-profile.php?<?php echo SID; ?>" class="nav-link">View Profile</a>
    </li>
    <li class="nav-item">
        <a href="./edit-profile.php?<?php echo SID; ?>" class="nav-link">Edit Profile </a>
    </li>
    <li class="nav-item">
        <a href="./Questionaire.php?<?php echo SID; ?>" class="nav-link">Questionaire</a>
    </li>
    <li class="nav-item">
        <a href="./my-match.php?<?php echo SID; ?>" class="nav-link active">my match <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a href="./logout.php" class="nav-link">Log out <?php echo $_SESSION['username']; ?> </a>
    </li>
<?php
    } else {
?>
    <li class="nav-item">
        <a href="../index.php" class="nav-link active">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a href="./user/view-profile.php?<?php echo SID; ?>" class="nav-link">View Profile</a>
    </li>
    <li class="nav-item">
        <a href="./user/edit-profile.php?<?php echo SID; ?>" class="nav-link">Edit Profile</a>
    </li>
    <li class="nav-item">
        <a href="./user/Questionaire.php?<?php echo SID; ?>" class="nav-link">Questionaire</a>
    </li>
    <li class="nav-item">
        <a href="user/my-match.php?<?php echo SID; ?>" class="nav-link">my match </a>
    </li>
    <li class="nav-item">
        <a href="user/logout.php" class="nav-link">Log out <?php echo $_SESSION['username']; ?> </a>
    </li>

<?php
}
?>
    

</ul>

<?php
} else {
?> 
<ul class="nav nav-tabs">
    <li class="nav-item">
    <a href="../index.php" class="nav-link active">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
    <a href="user/signup.php" class="nav-link">Sign Up</a>
    </li>
    <li class="nav-item">
    <a href="user/login.php" class="nav-link">Log In</a>
    </li>
</ul>

<?php
}

?> 

