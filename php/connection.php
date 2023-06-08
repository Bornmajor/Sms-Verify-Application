<?php
$connection = mysqli_connect("localhost","root","","sms");
if($connection == false){
    die("Could not connect Server -> DB". mysqli_connect_error());
}
ob_start(); 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

?>