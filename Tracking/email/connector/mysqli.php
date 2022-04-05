<?php
    $server = "localhost";
    $port = "";
    $username = "";
    $password = "";
    $database = "";

    $connection = mysqli_connect("$servername", $username, $password, $database, $port);

    if (!$connection) {
        die("Connection Failed! If you aren't the admin of this website either contact the admin or wait till it gets fixed!");
    }
?>