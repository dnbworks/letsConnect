<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lets Connect - View Profile</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <div class="container">
    <h2>Lets Connect - View Profile</h2>
    <?php
    if (isset($_COOKIE['username'])) {
    ?>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a href="index.php" class="nav-link ">Home </a>
        </li>
        <li class="nav-item">
          <a href="view-profile.php" class="nav-link active">View Profile <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="edit-profile.php" class="nav-link">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">Log out <?php echo $_COOKIE['user_id'] ?> </a>
        </li>
      </ul>



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


    <?php
    }
    ?>

    <?php
    require_once("connectvars.php");

    $dbc = mysqli_connect(host, user, pwd, database) or die("couldn't connect to database");
    $user_idCookie = $_COOKIE['user_id'];

    $query = "SELECT * FROM mismatch_users WHERE user_id = '$user_idCookie'";
    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
      $row = mysqli_fetch_array($data);
      echo '<table>';

      echo '<tr>';
      echo '<td>Username: </td>';
      echo '<td>' . $row["username"] . '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>First name: </td>';
      echo '<td>' . $row["first_name"] . '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>Last name: </td>';
      echo '<td>' . $row["last_name"] . '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>Gender: </td>';
      echo '<td>' . $row["gender"] . '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>Birthdate: </td>';
      echo '<td>' . $row["birthdate"] . '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>City: </td>';
      echo '<td>' . $row["city"] . '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td>State: </td>';
      echo '<td>' . $row["state"] . '</td>';
      echo '</tr>';

      echo '</table>';
    }
    mysqli_close($dbc);




    ?>
    <p>Would you like to <a href="edit-profile.php">Edit your profile</a></p>


    

  </div>





  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>