
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar Wars</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        nav {
        width: 500px;
        margin-left: 50px;
        margin-top: 20px;
        }

        nav ul {
        list-style-type: none;
        display: flex;
        justify-content: space-around;
        }

        nav ul li a {
        text-decoration: none;
        font-size: 1.2rem;
        }

       

       
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="index.php">Add High Score</a></li>
            <li><a href="adminpage.php">Admin Page</a></li>
        </ul>
    </nav>
<div class="container">


<form method="post" action="pic.php" enctype="multipart/form-data">
    <input type="file" name="screenshot" id="screenshot" value="">
    <input type="submit" value="Add" name="submit">
</form>

    
</div>
</body>
</html>