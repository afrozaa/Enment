<?php

    if(isset($_GET["email"])){
        
        $email = $_GET["email"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "enment";

       $connection = new mysqli($servername, $username, $password, $database);
    echo $email;
    
    $sql = "DELETE FROM signup WHERE email='$email'";
    echo $sql;

    $connection->query($sql);
}

header("location: /Enment/index.php");
exit;

?>