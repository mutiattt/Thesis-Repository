<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online thesis Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class="wrapper">
    <header>
       <style>
            nav{
    float:right;
    word-spacing: 30px;
    padding:20px;
    }
            nav li{
                color:black;
                display:inline-block;
                line-height: 80px;
    }
    .w-100 {
            height: 650px;
        }

        @media only screen and (max-width: 600px) {
            .w-100 {
                height: 340px;
            }
        }

        </style> 
        <div class="logo">
          <img src="LCU LOGO.png" alt="logo">
          <h1 style="color:white;"></h1>
        </div>

        <?php
          if(isset ($_SESSION['login_user'])){
            ?>
             <nav>
               <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="test.php">Feedback</a></li>
              </ul>
          </nav>
          <?php

          }
          else{
            ?>
             <nav>
               <ul>
                 <li><a href="index.php">Home</a></li>
                 <li><a href="projects.php">Projects</a></li>
                 <li><a href="admin-login.php">Login</a></li>
                 <li><a href="registration.php">Register</a></li>
                 <li><a href="test.php">Feedback</a></li>
               </ul>
        </nav>
        <?php
          }
        ?>
         

    </header>
    <section>
        <!--<div class="section_img">
        <br><br><br>
        <div class="box">
            <br><br><br><br>
            <h1 style="text-align:center; font-size:40px;">Department of Computer Sciences</h1><br>
        </div>
        </div> --->

        <!-- CAROUSEL-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pic1.jpeg" height="600px" height="340px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Department of Computer Sciences</h2>
                    <p>Online Thesis Repository</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="pic2.jpeg" height="600px" height="340px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="pic3.png" height="600px" height="340px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </section>
    <footer>
    <?php
        include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    </footer>
    </div>

</body>
</html>