<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style type="text/css"> 
       .wrapper{
         width:300px;
         margin:0 auto;
         color:white;
         text-align:center;
        
       }
    </style>
</head>
<body style="background-color:#6583ac;">
    <div class="container">
        <form action="" method="post">
            <button class="btn btn-default" style="float: right; width:70px;" name="submit1">Edit</button>
        </form>
        <div class="wrapper">
            <?php
            if (isset($_POST['submit1'])){
              ?>
              <script type="text/javascript">
                  window.location="edit.php"
                 </script>
                 <?php
            }
            $q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]'; ");
            ?>
            <h2 style="text-align:center;"> My Profile</h2>

            <?php
               $row=mysqli_fetch_assoc($q);

               echo "<div style='text-align:center'>
                        <img class='img-circle profile-img' height=120 
                        width=120 src='images/".$_SESSION['pic']."'>
                   </div>";
            ?>
            <div style="text-align:center;"><b>Welcome
                 <h4>
                    <?php echo $_SESSION['login_user']; ?>
                </h4>
           </div>
            <?php
             echo "<b>";
             echo "<table class='table table-bordered'>";
               echo "<tr>";
                   echo "<td>";
                     echo "<b> First Name: </b>";
                   echo "</td>";
                   echo "<td>";
                      echo $row['First'];
                   echo "</td>";
                echo "</tr>";


               echo "<tr>";
                   echo "<td>";
                     echo "<b> Last Name: </b>";
                   echo "</td>";
                   echo "<td>";
                     echo $row['Last'];
                   echo "</td>";
               echo "</tr>";

               echo "<tr>";
                   echo "<td>";
                     echo "<b> Email: </b>";
                   echo "</td>";
                   echo "<td>";
                     echo $row['email'];
                   echo "</td>";
               echo "</tr>";

               echo "<tr>";
                   echo "<td>";
                     echo "<b> Matric No: </b>";
                   echo "</td>";
                   echo "<td>";
                     echo $row['matric'];
                   echo "</td>";
               echo "</tr>";

               echo "<tr>";
                   echo "<td>";
                     echo "<b> Department: </b>";
                   echo "</td>";
                   echo "<td>";
                     echo $row['department'];
                   echo "</td>";
               echo "</tr>";

               echo "<tr>";
                   echo "<td>";
                      echo "<b> Username: </b>";
                   echo "</td>";
                   echo "<td>";
                     echo $row['username'];
                   echo "</td>";
               echo "</tr>";

               echo "<tr>";
                   echo "<td>";
                      echo "<b> Contact: </b>";
                   echo "</td>";
                   echo "<td>";
                      echo $row['contact'];
                   echo "</td>";
               echo "</tr>";
             echo "</table>"; 
             echo "</b>";

            ?>
        </div>

    </div>
</body>
</html>