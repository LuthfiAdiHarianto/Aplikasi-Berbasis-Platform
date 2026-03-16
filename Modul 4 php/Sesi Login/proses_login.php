<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_SESSION['username']) && isset($_SESSION['password'])){

if($username == $_SESSION['username'] && $password == $_SESSION['password']){

header("Location: login.php?welcome=".$username);

}else{

header("Location: login.php?error=1");

}

}else{

header("Location: login.php?error=1");

}

?>