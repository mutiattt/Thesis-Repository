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
        background-color:lightslategrey;
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
.h:hover{
  color:white;
  width:300px;
  height:50px;
  background-color:#576da2;
}
.project{
    width:400px;
    margin:0 auto;
}
.form-control{
    background-color: black;
    color:white;
    height:40px;

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
                  { echo "<img class='img-circle profile_img' height=120 width=120 src='images/user.jpeg".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user'];
                    }
                  ?>
            </div><br><br>

  <div class="h"><a href="add.php">Add Projects</a></div>
  <div class="h"><a href="delete.php">Delete Projects</a></div>
  <div class="h"><a href="#">Thesis Requests</a></div>
  <div class="h"><a href="#">Information</a></div>
</div>

<div id="main">
   <span style="font-size:30px;cursor:pointer; color:black;" onclick="openNav()">&#9776; open</span>
   <div class="container" style="text-align:center;">
    <h2 style="color:black;font-family:Lucida Console; text-align:center"><b> Add New Projects</b></h2>
    <form class="project" action="" method="post">
        <input type="text" name="title" class="form-control" placeholder="Project Title" required=""><br>
        <input type="text" name="author" class="form-control" placeholder="Author" required=""><br>
        <input type="text" name="year" class="form-control" placeholder="Year" required=""><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
        <input type="text" name="supervisor" class="form-control" placeholder="Supervisor" required=""><br>

        <button style="text-align:center;" class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
   </div>
<?php
   if(isset($_POST['submit']))
   {
    if(isset($_SESSION['login_user'])){
        mysqli_query($db,"INSERT INTO `projects`(`title`, `author`, `year`, `status`, `department`, `supervisor`) VALUES ('$_POST[title]','$_POST[author]','$_POST[year]','$_POST[status]','$_POST[department]','$_POST[supervisor]')");
        ?>
        <script type="text/javascript">
            alert("Project Added Succesfully.");
        </script>
        <?php

    
    }
    else{
        ?>
        <script type="text/javascript">
            alert("You need to login first.");
        </script>
        <?php

    }
   }
?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor ="rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor ="lightslategrey";

}
</script>
</body>
</html>
