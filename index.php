<?php
   require_once("functions/startsession.php");

   $pagetitle = 'Where opposites attract!';
   $pageIndex = 1;


   require_once("functions/connectvars.php"); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>letsConnect - Where opposites attract!</title>


    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        footer {
            border-top: 1px solid rgb(163, 163, 163);
            padding: 10px 10px;
            margin-top:15px;
        }
    </style>
    
</head>
<body>
<div class="container">
    <?php
        echo '<h2>lets connect -' . $pagetitle . '</h2>';
        require_once("partials/navmenu.php");
    ?>  



<h3>Lastest Members</h3>
<?php
   define("location", "uploads/");

   $dbc = mysqli_connect(host, user, pwd, database ) or die("couldn't connect to database");
    

   $query = "SELECT * FROM mismatch_users ORDER BY join_date DESC";

   $data = mysqli_query($dbc, $query);

   echo '<table>';
   while($row = mysqli_fetch_array($data)){
    echo '<tr>';
    if(is_file(location . $row['picture']) && filesize(location . $row['picture']) > 0) {
      echo '<td class="img"><img src="' . location . $row['picture'] . '" width="100px" /></td>';
   } else {
      echo "<td class='img'><img width='100px' src='" . location . "profile.jpg" . "' /></td>";
   }

   if (isset($_SESSION['user_id'])) {

    echo '<td><a href="user/view-profile.php?id='. $row['user_id'] .'">' . $row['first_name'] . ' ' . $row['last_name'] . '</a></td>';

    }
    else {
    echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
    } 

    
    echo '</tr>'; 

  }

  echo '</table>';

  mysqli_close($dbc);
   
?>


<?php
  require_once("partials/footer.php");
?>


