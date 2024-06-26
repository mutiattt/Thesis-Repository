<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Login</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <style type="text/css">
        section{
            margin-top: -20px;;
        }
    </style>
</head>
<body>  
<section>
        <div class="login-img">
            <br><br><br>
            <div class="box1">
                <h1 style="text-align:center; font-size:25px;">Login</h1>
                <form name="login" action="" method="post">
                    <br>
                    <div class="login">
                    <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br><br>
                    <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br><br>
                    <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width:60px; background-color:lightblue;"> </div>
                    <p style="color:black; padding-left:15px;">
                    <br><br>
                    <a  style="color:blue; text-decoration:none;" href="update_password.php">Forgot password</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    New to this website? <a style="color:blue; text-decoration:none;" href="registration.php">Sign Up</a>
                </p>
            </form>

            </div>
        </div>
    </section>

    <?php

      if(isset($_POST['submit'])){
        $count=0;
        $result=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");

        $row= mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);

        if($count==0){
            ?>
             <script type="text/javascript">
                alert("The username and password doesn't match. Try again");
             </script>

           <?php
        }
        else{
            $_SESSION['login_user']=$_POST['username'];
            $_SESSION['pic']=$row['pic'];
            
            ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
            <?php
        }

      }
    ?>
</body>
</html>