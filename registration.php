<?php
   include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

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
        <div class="reg_section" style="background-color:#576da2;">

          <div class="registration img">
            <br><br><br>
            <div class="box2">
                <h1 style="text-align:center; font-size:30px;">Admin Registration </h1><br>
                <form name="Registration" action="" method="post">
                    <br>
                    <div class="signup">
                   <input class="form-control" type="text" name="First" placeholder="First Name" required=""> <br>
                   <input class="form-control" type="text" name="Last" placeholder="Last Name" required=""> <br>
                   <input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
                   <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                   <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""> <br>
                   <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                   <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width:70px; height:30px; background-color:#576da2;"> </div>
                </form>

            </div>
          </div>
        </div>
        <!--
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal1">
                Signup
            </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Student Signup page</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="admin-login.php" method="post">
                            <div class="modal-body">
                            <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">FirstName</label>
                                    <input type="text" name="First" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your Firstname">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">LastName</label>
                                    <input type="text" name="Last" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your Lastname">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Enter your Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Enter your Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your Username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                    <input type="tel" name="contact" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your phone number">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Signup</button>
                                </div>
                            </div>
                        </form>
                    </div> -->


  

            

                      
    </section>
    <?php
      if (isset($_POST['submit'])){
        $count=0;
        $sql="SELECT username FROM admin";
        $result=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($result)){
          if ($row['username']== $_POST['username']){
            $count=$count +1;
          }
        }
      if($count==0)
        {mysqli_query($db,"INSERT INTO `admin`(`First`, `Last`, `email`, `username`, `contact`, `password`, `pic`) VALUES ('$_POST[First]','$_POST[Last]','$_POST[email]','$_POST[username]','$_POST[contact]','$_POST[password]','user.jpeg')");
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