<?php

require 'vendor/autoload.php';

//$client=new MongoDB\Client;
//echo "Database Connected Successfully";
//$db=$client->dbs;
$collection = (new MongoDB\Client)->dbs->news;
//$result1=$db->createCollection("news");
//var_dump($result);
//$result=$db->dropCollection("empcollection")





?>
