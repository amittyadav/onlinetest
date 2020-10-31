<?php
require '../config.php';

$msg = '';

  if (isset($_POST['submit'])) {

    $category = $_POST['category'];
    $name = $_POST['ques'];
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $op4 = $_POST['op4'];
    $answer = $_POST['answer'];

    $arr = array($op1, $op2, $op3, $op4);

    $ans = array_search($answer, $arr);


    $sql = "INSERT INTO question (`question`, `option1`, `option2`, `option3`, `option4`, `rightanswer`, `category`) VALUES ('$name', '$op1'
    , '$op2', '$op3', '$op4', '$ans', '$category')";
    if (mysqli_query($conn, $sql)) {
      $msg = "Question Added Successfully";
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
    <li><a href="question.php">Add Question</a></li>
    <li><a href="viewQuestion.php">View Question</a></li>
    <li><a href="#">User Result</a></li>

</ul>

</div>
<p><?php echo $msg; ?></p>
  <form action="question.php" method="post">

  <p>

  <label>Category</label>
    <select name="category">
    <?php
    $sql = "SELECT * FROM category";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
      ?>
      <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
<?php
    }
  ?>
    </select>
  </p>
  <p>
<label for="ques">Question <input class="input" type="text" name="ques" required></label>
    </p>

  <p>

<label for="ques">OPtion1 <input class="input" type="text" name="op1" required></label>
    </p>

  <p>
<label for="ques">OPtion2 <input class="input" type="text" name="op2" required></label>

   </p>

  <p>

<label for="ques">OPtion3 <input class="input" type="text" name="op3" required></label>

   </p>

  <p>

<label for="ques">OPtion4 <input class="input" type="text" name="op4" required></label>

    </p>

  <p>

<label for="ques">Right Answer <input class="input" type="text" name="answer" required></label>

   </p>

<p>

</p>

<p><input type="submit" name="submit" value="Submit" class="submit">

  </form>

   </body>
</html>
