<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LOADING PROCESS </title>
</head>

<body>
    <!-- To simulate the script, I have created a basic file upload system with an html and php to upload for us. -->
<?php

if (@$_FILES["file"]):
@$file = $_FILES["file"] ["tmp_name"];
@$name = $_FILES["file"] ["name"];

move_uploaded_file($file,$name);

echo "File Uploaded Successfully";

else:
?>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">

<input type="file" name="file" class="button"> <br>
<input type="submit" name="button" class="button"> <br>

</form>

<?php
endif;


?>

</body>
</html>