<?php


require_once __DIR__ . "/vendor/autoload.php";


$collection = (new MongoDB\Client)->dbs->news;


?>


<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>News feed</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>


<div class="container">
<h1>News Feed</h1>


<a href="create.php" class="btn btn-success">Add News</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-borderd">
   <tr>
      <th>title</th>
      <th>Details</th>
      <th>Action</th>
   </tr>
   <?php


      require 'user.php';


      $news = $collection->find([]);


      foreach($news as $new) {
         echo "<tr>";
         echo "<td>".$new->title."</td>";
         echo "<td>".$new->description."</td>";
         echo "<td>";
         echo "<a href='edit.php?id=".$new->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete.php?id=".$new->_id."' class='btn btn-danger'>Delete</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>
</div>


</body>
</html>