<?php


session_start();


require 'user.php';


if (isset($_GET['id'])) {
   $new = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['title' => $_POST['title'], 'description' => $_POST['description'],]]
   );


   $_SESSION['success'] = "Book updated successfully";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>PHP & MongoDB - CRUD Operation Tutorials - ItSolutionStuff.com</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>


<div class="container">
   <h1>Create Book</h1>
   <a href="index.php" class="btn btn-primary">Back</a>


  <form method="POST">
      <div class="form-group">
         <strong>Name:</strong>
         <input type="text" name="title" value="<?php echo $new->title; ?>" required="" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
         <strong>Detail:</strong>
         <textarea class="form-control" name="description" placeholder="Detail" placeholder="Detail"> <?php echo $new->description; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>


</body>
</html>