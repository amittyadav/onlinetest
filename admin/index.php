<?php

require '../config.php';
$msg = '';
  if (isset($_POST['submit'])) {
    $name = $_POST['ques'];

    $sql = "INSERT INTO category (`name`) VALUES ('$name')";
    if (mysqli_query($conn, $sql)) 
      {
      $msg = "Category Added Successfully";
    }

  }

  if (isset($_GET['id'])) 
{

    $id = $_GET['id'];
    $sql = "DELETE FROM category WHERE id = '$id' ";
    if (mysqli_query($conn, $sql)) {
      $msg = "Delete successfully";
    }
    
}

?>

<!DOCTYPE html>

<html lang="en">

 <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="../style.css">

</head>

<body>

<div id="navbar">

<ul>

  <li><a href="index.php">Home</a></li>
   <li><a href="question.php">Add More Questions</a></li>
   <li><a href="viewQuestion.php">your added Question</a></li>

   <li><a href="#">User Result</a></li>
</ul>
</div>

   <p>

<?php echo $msg; ?>

</p>

  <form action="index.php" method="post">

   <p>

<label for="ques">Category <input class="input" type="text" name="ques" required></label>

</p>

    <p>

</p>

<p><input type="submit" name="submit" value="Submit" class="submit">

</form>

<table>

  <tr>

    <th>Sr No.</th>
    <th>Category Name</th>
    <th>Action</th>

  </tr>

  <?php

    $i = 1;
    $sql = "SELECT * FROM category";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {

   ?>

    <tr>

      <td><?php echo $i++; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><a href="index.php?id=<?php echo $row['id']; ?>">Delete</a></td>

    </tr>

      <?php
    }
    
  ?>

   </table>

</body>

</html>
