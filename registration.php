<?php
   include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <style type="text/css">
    section{
        margin-top: -20px;;
    }
</style>
</head>
<body>  
    <section>
        <div class="reg_section">
          <div class="registration img">
            <br><br>
            <div class="box2">
                <h1 style="text-align:center; font-size:30px;">Student Registration</h1><br>
                <form name="Registration" action="" method="post">
                    <br>
                    <div class="signup">
                   <input class="form-control" type="text" name="First" placeholder="First Name" required=""> <br>
                   <input class="form-control" type="text" name="Last" placeholder="Last Name" required=""> <br>
                   <input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
                   <input class="form-control" type="text" name="matric" placeholder="Matric No" required=""> <br>
                   <input class="form-control" type="text" name="department" placeholder="Department" required=""> <br>
                   <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                   <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""> <br>
                   <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                   <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width:70px; height:30px; background-color:lightblue;"> </div>
                </form>

            </div>
          </div>
        </div>
    </section>
      
    <?php
      if (isset($_POST['submit'])){
        $count=0;
        $sql="SELECT username FROM student";
        $result=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($result)){
          if ($row['username']== $_POST['username']){
            $count=$count +1;
          }
        }
      if($count==0)
        {$sql= mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[First]', '$_POST[Last]','$_POST[email]','$_POST[matric]','$_POST[department]',
        '$_POST[username]','$_POST[password]','$_POST[contact]','user.jpeg');");
      ?>
       <script type="text/javascript">
        alert("Registration successful");
       </script>
      <?php
    }
      else{
        ?>
        <script type="text/javascript">
         alert("Username already exists.");
        </script>
       <?php
 
      }
    }
    ?>

</body>
</html>