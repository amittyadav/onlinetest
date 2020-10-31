<?php

require 'config.php';

  $category = $_POST['category'];

  $correct = 0;

  $wrong = 0;

  $sql = "SELECT * FROM question WHERE category = '$category' ";

  $res = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($res)) {
  
      if ($data['rightanswer'] == $_POST[$data['id']]) {
        $correct++;
      } else {
        $wrong++;
      }
  }
  echo "Total Question ". ($correct + $wrong);
  echo "<br>";
  echo "Correct ".$correct;
  echo "<br>";
  echo "Wrong ".$wrong;
  echo "<br>";
  $per = $correct*100/($correct+$wrong);
  echo "Total Percentage " . $per . "%";
?>