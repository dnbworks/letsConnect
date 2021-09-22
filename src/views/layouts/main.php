<?php
    use app\core\Application;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Date - <?php echo $this->title; ?></title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/favicon.jpg" type="image/jpg">
</head>
<body>
  
    <div class="wrapper">
        <div class="container">
            <?php
                include_once dirname(__DIR__). "/partials/header-nav.php";
            ?>  
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3 bg">
                    <div class="side-header">
                    <?php if(Application::$app->user->picture): ?>
                        <img src="/uploads/<?php echo Application::$app->user->picture;?>" alt="" srcset="" width="100px">
                    <?php else: ?>
                        <img src="/assets/img/nopic.jpg" alt="" srcset="" width="100px">
                    <?php endif; ?>
                        <!-- <img src="/uploads/1631300011pinterest.png" alt="" srcset="" width="100px"> -->
                        <a href="/view-profile">
                            <?php echo Application::$app->user->firstname;?> <?php echo Application::$app->user->lastname;?> 
                        </a>
                        <p> </p>
                    </div>
                    <ul>
                        <li><a href="/home">Members</a></li>
                        <li><a href="/questionaire">Questionaire</a></li>
                        <li><a href="/mismatch">Mismatch</a></li>
                        <li><a href="/account">Account</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                     {{content}}
                </div>
            </div>
            
        </div>

        
        <?php
            include_once dirname(__DIR__). "/partials/footer.php";
        ?>
    </div>
  
</body>
</html>