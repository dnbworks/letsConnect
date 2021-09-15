<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC framework</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="banner">
        <div class="container">
            <nav class="d-flex justify-content-between align-items-center">
                <a href="/" class="logo">FindMyDate</a>
                <div>
                    <a href="/login" class="signin" style="margin-right:20px;">Sign In</a>
                    <a href="/register" class="signin">Sign Up</a>
                </div>
                
            </nav>
            {{content}}
        </div>

    </div>
</body>
</html>