<?php
session_start();
include('config.php');

?>

<html>

    <head>

    <title></title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <h1>Online Quiz in PHP</h1>
    <div id="navbar">
   <ul>
   <li><a href="#" onclick="myfun()">Home</a></li>
   <li><a href="#">Profile</a></li>
   <li><a href="#">Menu</a></li>
   <li><a  href="logout.php" style="margin-left: 900px;">Log out</a></li>

</ul>

  </div>

<div>

<p>Welcome <?php echo $_SESSION['name'] ?></p>

     <center><p style="font-size:30px;">Start your quiz by clicking on start quiz button.</p><center>

     <form action="question.php" method="post">
 <p>
      <label>Select Your Test</label>
         <select name="category" required>
        <option value="">Select Quize</option>
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
    <input type="submit" value="CLICK TO START YOUR QUIZ" name="submit">
  </p>

 </form>
      </div>

                </body>

        </html>