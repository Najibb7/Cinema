<?php
require_once 'db_conf.php';
try {
    $conn = new PDO("mysql:host=$dbhost; dbname=$dbname", "$user", "$password");
}catch(PDOException $error){
    echo "DATABASE IS NOT CONNECTED" . " &#10007;" . "<br />";
    echo $error->getCode().' '.$error->getMessage();
}


