<?php
   include "navbar.php";
   include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style type="text/css">
        .form-control{
            width:250px;
            height:35px;
        }
        form{
            padding-left:550px;
        }
        label{
            color:white;
        }

    </style>
</head>
<body style="background-color:#6583ac;">
    
   <h2 style="text-align:center;color:white;">Edit Information</h2>
   <?php
      $sql ="SELECT * FROM student WHERE username='$_SESSION[login_user]' ";
      $result =mysqli_query($db,$sql) or die (mysql_error());

     while ($row =mysqli_fetch_assoc($result)){
         $First=$row['First'];
         $Last=$row['Last'];
         $email=$row['email'];
         $username=$row['username'];
         $contact=$row['contact'];
         $password=$row['password'];
   }
   ?>

   <div class="profile_info" style="text-align:center;">
       <span style="color: white;">Welcome,<span>
        <h4 style=color:white;"><?php echo $_SESSION['login_user']; ?></h4>
    </div><br><br>
  <div class="form1">
        <form action="" method="post" enctype="multipart/form-data">
        <input class="form-control" type="file" name="file">


        <label><h4><b>First Name: </b></h4></label>
        <input class="form-control" type="text" name="First" value= "<?php echo $First; ?>">

        <label><h4><b>Last Name: </b></h4></label>
        <input class="form-control" type="text" name="Last" value= "<?php echo $Last; ?>">

        <label><h4><b>Email: </b></h4></label>
        <input class="form-control" type="text" name="email" value= "<?php echo $email; ?>">

        <label><h4><b>Username: </b></h4></label>
        <input class="form-control" type="text" name="username" value= "<?php echo $username; ?>">

        <label><h4><b>Contact No: </b></h4></label>
        <input class="form-control" type="text" name="contact" value= "<?php echo $contact; ?>">

        <label><h4><b>Password: </b></h4></label>
        <input class="form-control" type="text" name="password" value= "<?php echo $password; ?>"><br>

        <div style="padding-left:100px;">
           <button class="btn btn-default" type="submit" name="submit">Save</button>
        </div>
        </form>
  </div>
    <?php

    if(isset($_POST['submit'])){

        move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
         $First=$_POST['First'];
         $Last=$_POST['Last'];
         $email=$_POST['email'];
         $username=$_POST['username'];
         $contact=$_POST['contact'];
         $password=$_POST['password'];
         $pic=$_FILES['file']['name'];

        $sql1= "UPDATE student SET pic='$pic' , First='$First', Last='$Last', email='$email', username='$username', contact='$contact', 
        password='$password'  WHERE username='".$_SESSION['login_user']."'; ";

        if(mysqli_query($db,$sql1)){
            ?>
            <script type= "text/javascript">
                alert("Saved Successfully.");
                window.location="profile.php";
            </script>
            <?php

        }

         
    }
    ?>
</body>
</html>
