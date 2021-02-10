
<?php
if(ISSET($_POST['submit'])){

$screenshot = $_FILES['screenshot'];

$screenshotname = $_FILES['screenshot']['name'];
echo $screenshotname;
}
?>