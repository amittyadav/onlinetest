<?php
  require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>

<link rel="stylesheet" href="../style.css">

    </head>
<div id="navbar">

<ul>

      <li><a href="index.php">Home</a></li>
      <li><a href="question.php">Add Question</a></li>
     <li><a href="viewQuestion.php">View Question</a></li>
      <li><a href="#">User Result</a></li>

</ul>

</div>
<body>
  <table>
    <tr>
      <th>Question</th>
      <th>OPtion1</th>
      <th>OPtion2</th>
      <th>OPtion3</th>
      <th>OPtion4</th>
      <th>Right Answer Index</th>
      <th>Category</th>
    </tr>

    <?php

    $sql = "SELECT * FROM question";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
      ?>

      <tr>
        <td><?php echo $row['question'] ?></td>
        <td><?php echo $row['option1'] ?></td>
        <td><?php echo $row['option2'] ?></td>
        <td><?php echo $row['option3'] ?></td>
        <td><?php echo $row['option4'] ?></td>
        <td><?php echo $row['rightanswer'] ?></td>
        <td><?php echo $row['category'] ?></td>
      </tr>
      <?php
    }

    ?>
  </table>
     </body>
            </html>