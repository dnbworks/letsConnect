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
    require_once("connectvars.php");
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
      $pic = "pic";
      $counter = 1;
      $query = "SELECT * FROM mismatch_users";
      $data = mysqli_query($dbc, $query);

      echo '<table>';
      while ($row = mysqli_fetch_array($data)) {
        echo '<tr>';
        echo '<td><img src="uploads/' . $pic . $counter++ . '.jpg" alt="" srcset=""></td>';
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
      <table>
        <tr>
          <td><img src="uploads/profile.jpg" alt="" srcset=""></td>
          <td>Aban Ajewvel</td>
        </tr>
        <tr>
          <td><img src="uploads/profile.jpg" alt="" srcset=""></td>
          <td>Jesuitas Linda Rose</td>
        </tr>
        <tr>
          <td><img src="uploads/profile.jpg" alt="" srcset=""></td>
          <td>Catambay Lemuel</td>
        </tr>
        <tr>
          <td><img src="uploads/profile.jpg" alt="" srcset=""></td>
          <td>Berdan Maria Nita</td>
        </tr>
        <tr>
          <td><img src="uploads/profile.jpg" alt="" srcset=""></td>
          <td>Magwili Heicel Kim</td>
        </tr>
        <tr>
          <td><img src="uploads/profile.jpg" alt="" srcset=""></td>
          <td>Nuelan Felix</td>
        </tr>
      </table>


    <?php
    }
    ?>




  </div>



</body>

</html>

<!-- 

INSERT INTO `mismatch_user`(`username`, `password`, `join_date`, `f_name`, `l_name`, `gender`, `birthday`, `city`, `state`, `picture`) VALUES ("KristelleTulania", SHA('2'), NOW(), "Kistelle", "Ann Tulania", "F", "2001-4-11", "Cainta", "rizal", "pic2.jpg");

-->