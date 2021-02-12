<?php
    require_once("connectvars.php");
    require_once("appvar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lets Connect</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h2>Lets Connect - Home Page</h2>
    <?php
    
    if (isset($_COOKIE['username'])) {
    ?>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a href="index.php" class="nav-link active">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="view-profile.php" class="nav-link">View Profile</a>
        </li>
        <li class="nav-item">
          <a href="edit-profile.php" class="nav-link">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">Log out <?php echo $_COOKIE['username'] ?> </a>
        </li>
      </ul>

      <?php
      $dbc = mysqli_connect(host, user, pwd, database) or die("couldn't connect to database");
      $query = "SELECT * FROM mismatch_users";
      $data = mysqli_query($dbc, $query);

      echo '<table>';
      while ($row = mysqli_fetch_array($data)) {
        echo '<tr>';
        echo '<td><img src="' . location . $row["picture"] . '" alt="" srcset=""></td>';
        echo '<td><a href="http://">' . $row['first_name'] . ' ' . $row['last_name'] . '</a></td>';
        echo '</tr>';
      }

      echo '</table>';

      mysqli_close($dbc);
      ?>

    <?php
    } else {

    ?>

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a href="index.php" class="nav-link active">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="signup.php" class="nav-link">Sign Up</a>
        </li>
        <li class="nav-item">
          <a href="login.php" class="nav-link">Log In</a>
        </li>
      </ul>

      <h3>Lastest Members</h3>

    <?php
      $dbc = mysqli_connect(host, user, pwd, database) or die("couldn't connect to database");
      $query = "SELECT * FROM mismatch_users";
      $data = mysqli_query($dbc, $query);

      echo '<table>';
      while ($row = mysqli_fetch_array($data)) {
        echo '<tr>';
        echo '<td><img src="'  . location . $row["picture"] .  '" alt="" srcset=""></td>';
        echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';

      mysqli_close($dbc);

    }
    ?>




  </div>



</body>

</html>

