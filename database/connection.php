<?php
try{
    $connection = new PDO('mysql:dbname=ecommerce;host=localhost','root','');
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
}catch (PDOException $e){
    echo 'something went wrong';

}

