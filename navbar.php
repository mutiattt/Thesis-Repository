<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand active">ONLINE THESIS REPOSITORY SYSTEM</a>
        </div>
              <ul class="nav navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="projects.php">Projects</a></li>
                  <li><a href="">Feedback</a></li>
             </ul>
            
             <?php 
               if(isset($_SESSION['login_user'])){
                ?>
                <ul class="nav navbar-nav"> 
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="student.php">Student-Info</a></span></li>
               </ul>
                <ul class="nav navbar-nav navbar-right"> 
                  <li><a href="profile.php">
                    <div style="color:white;">
                      <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user'];
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "> Logout</span></a></li>
               </ul>
                <?php
               }
               else{
                ?>
                <ul class="nav navbar-nav navbar-right"> 
                  <li><a href="admin-login.php"><span class="glyphicon glyphicon-log-in "> Login</span></a></li>
                  <li><a href="registration.php"><span class="glyphicon glyphicon-user "> SignUp</span></a></li>
              </ul>
              <?php
               }
             ?>
             
      </div>
    </nav>
  
</body>
</html>