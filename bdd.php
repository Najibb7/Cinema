<?php

try {
    $conn = new PDO("mysql:host=localhost; dbname=cinema", "root", "root");
}catch(PDOException $error){
    echo "DATABASE IS NOT CONNECTED" . " &#10007;" . "<br />";
    echo $error->getCode().' '.$error->getMessage();
}


