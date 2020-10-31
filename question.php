<?php
require 'config.php';
$category =  $_POST['category'];
?>
<!DOCTYPE html>

<html lang="en">

    <head>

    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <style>

    .hide {
      display: none;
    }
  </style>

</head>

<body>
    <form action="answer.php" method="post">

    <input type="hidden" name="category" value="<?php echo $category; ?>">
      <?php
        $sql = "SELECT * FROM question WHERE category = '$category' ";
        $res = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($res);
        if ($rows > 0) {
          $count = 1;
   while ($row = mysqli_fetch_assoc($res)) {
     if ($count == 1) {
              ?>
              <div id="question<?php echo $count; ?>" class="ques">
                <div><?php echo $count; ?><?php echo $row['question']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="0" required><?php echo $row['option1']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="1" required><?php echo $row['option2']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="2" required><?php echo $row['option3']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="3" required><?php echo $row['option4']; ?></div>
                <button class="next" id="<?php echo $count; ?>" type="button">Next</button>
</div>
              <?php
              $count++;
            } else if(($count > 1) && ($count < $rows)) {
            ?>
            <div id="question<?php echo $count; ?>" class="ques">
                <div><?php echo $count; ?><?php echo $row['question']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="0" required><?php echo $row['option1']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="1" required><?php echo $row['option2']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="2" required><?php echo $row['option3']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="3" required><?php echo $row['option4']; ?></div>
                <button class="next" id="<?php echo $count; ?>" type="button">Next</button>
                <button class="previous" id="<?php echo $count; ?>" type="button">Previous</button>
  </div>
            <?php
            $count++;
            } else if ($count == $rows) {
              ?>
              <div id="question<?php echo $count; ?>" class="ques">
                <div><?php echo $count; ?><?php echo $row['question']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="0" required><?php echo $row['option1']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="1" required><?php echo $row['option2']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="2" required><?php echo $row['option3']; ?></div>
                <div><input type="radio" name="<?php echo $row['id']; ?>" value="3" required><?php echo $row['option4']; ?></div>
                
                <button class="previous" id="<?php echo $count; ?>" type="button">Previous</button>
                <input type="submit" value="Submit">

              </div>

              <?php
              $count++;
            }
          }
        }
      ?>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

    </script>
    <script>
      $(document).ready(function () {
        $('.ques').addClass('hide');
        $('#question'+1).removeClass('hide');

        $(document).on('click', '.next', function(){
          last = parseInt($(this).attr('id'));
          next = last+1;

          $('#question'+last).addClass('hide');
          $('#question'+next).removeClass('hide');
        });

        $(document).on('click', '.previous', function(){
          last = parseInt($(this).attr('id'));
          pre = last-1;

          $('#question'+last).addClass('hide');
          $('#question'+pre).removeClass('hide');
        });
      });

    </script>
</body>
</html>