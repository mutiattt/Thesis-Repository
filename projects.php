<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      .srch{
        padding-left:1000px;
      }
      body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
.h:hover{
  color:white;
  width:300px;
  height:50px;
  background-color:#576da2;
}
    </style>
</head>
<body>
  <!-----side nav----->
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
            </div><br><br>

  <div class="h"><a href="add.php">Add Projects</a></div>
  <div class="h"><a href="delete.php">Delete Projects</a></div>
  <div class="h"><a href="request.php">Thesis Requests</a></div>
</div>

<div id="main">
   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


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
          <input class="form-control" type="text" name="search" placeholder="Search Title.." required>
          <button style="background-color:#576da2;" type="submit" name="submit" class="btn btn-default">
             <span class="glyphicon glyphicon-search" </span>
          </button>
      </form>
      <form class="navbar-form" method="post" name="form1">
          <input class="form-control" type="text" name="pid" placeholder="Enter Project ID" required>
          <button style="background-color:#576da2;" type="submit" name="submit1" class="btn btn-default">Delete
          </button>
      </form>
    </div>
   <h2> List Of Thesis</h2>
   <?php

    if(isset($_POST['submit'])){
      $q=mysqli_query($db,"SELECT * FROM `projects` WHERE  title like '%$_POST[search]%' ");

      if(mysqli_num_rows($q)==0){
        echo "Sorry! Not found.";

      }
      else{
        echo "<table class='table table-bordered table-hover'>";
         echo "<tr style='background-color:#576da2;'>";
            //table header
              echo "<th>"; echo "ID"; echo"</th>";
              echo "<th>"; echo "TITLE"; echo"</th>";
              echo "<th>"; echo "AUTHOR"; echo"</th>";
              echo "<th>"; echo "YEAR"; echo"</th>";
              echo "<th>"; echo "STATUS"; echo"</th>";
              echo "<th>"; echo "DEPARTMENT"; echo"</th>";
              echo "<th>"; echo "SUPERVISOR"; echo"</th>";
          echo"</tr>";
          while($row=mysqli_fetch_assoc($q)){
              echo "<tr>";
              echo "<td>"; echo $row['pid']; echo"</td>";
              echo "<td>"; echo $row['title']; echo"</td>";
              echo "<td>"; echo $row['author']; echo"</td>";
              echo "<td>"; echo $row['year']; echo"</td>";
              echo "<td>"; echo $row['status']; echo"</td>";
              echo "<td>"; echo $row['department']; echo"</td>";
              echo "<td>"; echo $row['supervisor']; echo"</td>";  

              echo "</tr>";
            }
      echo "</table>";
      }
    }
    /* if button is not pressed */
    else{
     $result=mysqli_query($db,"SELECT * FROM `projects`;");

     echo "<table class='table table-bordered table-hover'>";
         echo "<tr style='background-color:#576da2;'>";
            //table header
              echo "<th>"; echo "ID"; echo"</th>";
              echo "<th>"; echo "TITLE"; echo"</th>";
              echo "<th>"; echo "AUTHOR"; echo"</th>";
              echo "<th>"; echo "YEAR"; echo"</th>";
              echo "<th>"; echo "STATUS"; echo"</th>";
              echo "<th>"; echo "DEPARTMENT"; echo"</th>";
              echo "<th>"; echo "SUPERVISOR"; echo"</th>";
          echo"</tr>";
          while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['pid']; echo"</td>";
              echo "<td>"; echo $row['title']; echo"</td>";
              echo "<td>"; echo $row['author']; echo"</td>";
              echo "<td>"; echo $row['year']; echo"</td>";
              echo "<td>"; echo $row['status']; echo"</td>";
              echo "<td>"; echo $row['department']; echo"</td>";
              echo "<td>"; echo $row['supervisor']; echo"</td>";  

              echo "</tr>";
            }
      echo "</table>";
    }
    if(isset($_POST['submit1'])){
      if(isset($_SESSION['login_user'])){
        mysqli_query($db, "DELETE from projects where pid='$_POST[pid]';");

        ?>
        <script type="text/javascript">
          alert ("Delete Successful");
        </script>
        <?php
      }
      else{
        ?>
        <script type="text/javascript">
          alert ("Please Login First.");
        </script>
        <?php
  
      }
     
    }
   ?>
  </div>
</body>
</html>