<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mismatch - Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
<?php
if(ISSET($_POST['submit'])){
    $files = $_FILES['file'];

    $fileName = $_FILES['file']['name'];


    echo $fileName;
}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
    <div class="form-group">
        <div class="custom-file">
        <input type="file" id="example-file-custom-button" class="custom-file-input" name="file'" required>
        <label class="custom-file-label" for="example-file-custom-button" data-browse="Select file">Custom file browser</label>
        </div>
    </div>

    <div class="form-group">
        <div>
            <button type="submit" class="btn btn-primary" name="submit">Save Profile</button>
        </div>
    </div>
</form>
</div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>