<?php

// Database connection

$servername = "localhost";

$username = "admin";

$password = "";

$dbname = "cetsub";


$conn =  mysqli_connect($servername, $username, $password, $dbname);



if ($conn) {
    echo "";
}

else {
    echo "connection failed";
}



?>




