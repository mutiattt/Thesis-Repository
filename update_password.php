<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style type="text/css">
        body{
            width:100%;
            height:650px;
            background-image:url(pic2.jpeg);
            margin-top:0px;
            background-repeat: no-repeat;
        }
        .wrapper{
            width:500px;
            height:350px;
            background-color:#576da2;
            margin:150px auto;
            color:white;
            border-radius:5px;
            padding:27px 15px;
        }
        .form-control{
            width:400px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div style="text-align:center;">
            <h1 style="text-align:center; font-size:30px;font-family:Lucida Console;">Change Password</h1><br>
        </div>
        <div style="padding-left:30px">
        <form action="" method="post">
            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
            <input type="email" name="email" class="form-control" placeholder="Email" required=""><br>
            <input type="text" name="password" class="form-control" placeholder="New Password" required=""><br><br>
            <button class="btn btn-default" type="submit" name="submit" >Update</button>

        </form>
        </div>

    <?php
         if(isset($_POST['submit'])){
           if( $sql=mysqli_query($db,"UPDATE `admin` SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
           {
             ?>
              <script type="text/javascript">
                alert("Password updated sucessfully");
            </script>
            <?php
        
           }
         }
    ?>    
    </div>

</body>
</html>
