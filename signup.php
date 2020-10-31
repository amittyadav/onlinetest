      <?php
      include('config.php');
      $message='';
      $errors=array();

      if(isset($_POST['submit'])) {

      $username= isset($_POST['name'])?$_POST['name']:'';
      $email= isset($_POST['email'])?$_POST['email']:'';
      $password= isset($_POST['password'])?$_POST['password']:'';
      $repassword= isset($_POST['repassword'])?$_POST['repassword']:'';
      if($password != $repassword) {
        $errors[] = array('input'=>'password','msg'=>'password doesnt match');

      }

      $checkem = "SELECT * FROM users WHERE email='".$email."'";

      $result1 = $conn->query($checkem);



      if ($result1->num_rows > 0) {
      $errors[]=array("id"=>'form','msg'=>"Email already Exist, please enter new email id");

      }

      if(sizeof($errors)==0) {
      $sql = "INSERT INTO users (`name`, `email`, `password`)
      VALUES ('".$username."', '".$email."', '".$password."')";

      if ($conn->query($sql) === true) {
        
          header('location:login.php');
      } else {
      
          $errors[] = array('input'=>'form','msg'=>$conn->error);
      }
      }
      }

      ?>
      <html>
      <head>
      <title>
      Signup
      </title>
      <link rel="stylesheet" type="text/css" href="style.css">
      </head>
      <body>
      <h2>Signup</h2>
      <div>
      <?php echo $message; ?>
      </div>
      <div id="errors">
      <?php if(sizeof($errors)>0) : ?>

      <ul>
      <?php foreach ($errors as $error) : ?>
      <li><?php echo $error['msg'];?></li>
      <?php endforeach; ?>
      </ul>
      <?php endif; ?>


      </div>
      <form action="signup.php" method="POST">

      <p>

           <label for="name">Name <input class="input" type="text" name="name" required></label>

      </p>


      <p>

      <label for="email">Email <input class="input" type="text" name="email" required></label>

      </p>

      <p>

      <label for="password">Password <input class="input" type="password" name="password" required></label>

      </p>

      <p>

      <label for="repassword">Re-Password <input class="input" type="password" name="repassword" required></label>

      </p>

      <p><input type="submit" name="submit" value="Submit" class="submit">

      <a href="login.php" class="submit">Login</a>

      </p>
          </form>

       </body>
                    </html>