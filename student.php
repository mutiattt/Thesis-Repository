<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Info</title>
    <style type="text/css">
      .srch{
        padding-left:1000px;
      }
      body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  margin-top:50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.img-circle{
  margin-left:20px;
}
   </style>
</head>
<body>
  <!---side nav--->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div style="color:white; margin-left:60px;font-size:20px;">

                  <?php
                   if(isset($_SESSION['login_user']))

                   { echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user'];
                   }
                  ?>
            </div>

  <a href="profile.php">Profile</a>
  <a href="projects.php">Thesis</a>
  <a href="#">Thesis Requests</a>
  <a href="#">Information</a>
</div>

<div id="main">
   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
    <!-------SEARCH BAR ---->

    <div class="srch">
      <form class="navbar-form" method="post" name="form1">
          <input class="form-control" type="text" name="search" placeholder="student username.." required>
          <button style="background-color:#576da2;" type="submit" name="submit" class="btn btn-default">
             <span class="glyphicon glyphicon-search" </span>
          </button>
      </form>
    </div>
   <h2> List Of Students</h2>
   <?php

    if(isset($_POST['submit'])){
      $q=mysqli_query($db,"SELECT First,Last,email,matric,department,username,contact FROM `student`WHERE username like '%$_POST[search]%' ");
      
      if(mysqli_num_rows($q)==0){
        echo "Sorry! Username not found.Try searching again";

      }
      else{
        echo "<table class='table table-bordered table-hover'>";
          echo "<tr style='background-color:#576da2;'>";
            //table header
              echo "<th>"; echo "First Name"; echo"</th>";
              echo "<th>"; echo "Last Name"; echo"</th>";
              echo "<th>"; echo "Email"; echo"</th>";
              echo "<th>"; echo "Matric No"; echo"</th>";
              echo "<th>"; echo "Department"; echo"</th>";
              echo "<th>"; echo "Username"; echo"</th>";
              echo "<th>"; echo "Phone No"; echo"</th>";
          echo "</tr>";
          while($row=mysqli_fetch_assoc($q)){
              echo "<tr>";
              echo "<td>"; echo $row['First']; echo"</td>";
              echo "<td>"; echo $row['Last']; echo"</td>";
              echo "<td>"; echo $row['email']; echo"</td>";
              echo "<td>"; echo $row['matric']; echo"</td>";
              echo "<td>"; echo $row['department']; echo"</td>";
              echo "<td>"; echo $row['username']; echo"</td>";
              echo "<td>"; echo $row['contact']; echo"</td>";  

              echo "</tr>";
            }
      echo "</table>";
      }
    }
    /* if button is not pressed */
    else{
     $result=mysqli_query($db,"SELECT First,Last,email,matric,department,username,contact FROM `student`;");

     echo "<table class='table table-bordered table-hover'>";
         echo "<tr style='background-color:#576da2;'>";
            //table header
            echo "<th>"; echo "First Name"; echo"</th>";
            echo "<th>"; echo "Last Name"; echo"</th>";
            echo "<th>"; echo "Email"; echo"</th>";
            echo "<th>"; echo "Matric No"; echo"</th>";
            echo "<th>"; echo "Department"; echo"</th>";
            echo "<th>"; echo "Username"; echo"</th>";
            echo "<th>"; echo "Phone No"; echo"</th>";
          echo"</tr>";
          while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['First']; echo"</td>";
              echo "<td>"; echo $row['Last']; echo"</td>";
              echo "<td>"; echo $row['email']; echo"</td>";
              echo "<td>"; echo $row['matric']; echo"</td>";
              echo "<td>"; echo $row['department']; echo"</td>";
              echo "<td>"; echo $row['username']; echo"</td>";
              echo "<td>"; echo $row['contact']; echo"</td>";  

              echo "</tr>";
            }
      echo "</table>";
    }
   ?>
</body>
</html>