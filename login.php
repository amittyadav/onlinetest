<?php

session_start();

include('config.php');
$errors= array();
$message='';

if(isset($_POST['submit'])) {
  $email = isset($_POST['email'])?$_POST['email']:'';
  $password = isset($_POST['password'])?$_POST['password']:'';
  if(sizeof($errors)==0){
    $sql = "SELECT * FROM users WHERE `email` ='".$email."' AND `password`='".$password."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION['userdata'] = array('username'=>$row['name'],'id'=>$row['id'],'email'=>$row['email']);
        header('Location: dashboard.php');
        $_SESSION['name'] = $row['name'];
      }
    }else {
      $errors[] = array('input'=>'form','msg'=>'invalid login');
      
    }
  
  }

}

?>

<html>

<head>

<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<h2>Login</h2>
   <div id="errors">
<?php if(sizeof($errors)>0) : ?>
  <ul>

  <?php foreach ($errors as $error) : ?>
  <li><?php echo $error['msg'];?></li>
  <?php endforeach; ?>
  </ul>
    <?php endif; ?>

<form action="login.php" method="POST">

<p>
   <label for="email">Email: <input class="input" type="text" name="email" required></label>
</p>
<p>
    <label for="password">Password: <input class="input" type="password" name="password" required></label>
</p>
<p><input type="submit" name="submit" value="Submit" class="submit">
<a href="signup.php" class="submit">Register or Sign Up</a>

</p>
</form>
</body>
</html>