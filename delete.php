<?php


session_start();
require 'user.php';


$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);


$_SESSION['success'] = "Book deleted successfully";
header("Location: index.php");


?>