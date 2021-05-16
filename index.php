<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> File Upload To Remote System With PHP Curl </title>
</head>
<body>

<?php
/* After PHP 5.5 version, the following procedure is done because CURLOPT_POSTFIELDS detects the file to be uploaded to the target system as a string value. */
$localfile = "";

if (function_exists("curl_file_create")):

    $localfile = curl_file_create(realpath("test.jpg"));

else:

    $localfile = '@'.realpath("test.jpg");

endif;

$start = curl_init(); //We start the curl session

curl_setopt($start,CURLOPT_URL,"http://www.localhost/fileupload/upload.php"); //We tell it to pull the target site
curl_setopt($start,CURLOPT_SSL_VERIFYPEER,false); //If there is an SSL certificate on the target site, you can pass it with this command.
curl_setopt($start,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.2) AppleWebKit/535.19 (KHTML, like Gecko) Chorme/10.0.1025.168 Safari/535.19"); //If the target system checks whether the request is coming from a bot or a real person, this code will exceed it.
curl_setopt($start,CURLOPT_POST,true);//the process will be a post
curl_setopt($start,CURLOPT_PROXY,"IP"); //You can make your ip address appear different in the systems we connect with, you can enter an ip address you want.
curl_setopt($start,CURLOPT_PROXYPORT,"PORT"); //We can set the port to be used for the target system we are connecting with.
curl_setopt($start,CURLOPT_POSTFIELDS, array('file' => $localfile));//The value of the input file named file is specified as $ localfile.
curl_setopt($start,CURLOPT_RETURNTRANSFER,1);//If the operation is 0, it does not print all incoming data on the screen; if it is 1, it prints the incoming data
curl_setopt($start,CURLOPT_CONNECTTIMEOUT,0);//The value you enter instead of 0 sets the connection timeout.
curl_setopt($start,CURLOPT_TIMEOUT,100);//The value you enter instead of the value 100 sets the timeout of the operation.

$result = curl_exec($start);//Execute curl

curl_close($start);//End the curl process

echo $result; //It will be determined on the screen if the upload is successful / unsuccessful.

?>

</body>
</html>
