<?php
  include "connection.php";
  session_start();
?>
<footer>
    <div class="text-center" style="padding: 40px; background: black; color: white;">All rights reserved | <a href="#adminLogin" data-bs-toggle="modal" data-bs-target="#adminLogin" style="text-decoration: none; color: white;">Admin Login</a>
    </div>
</footer>
<div class="modal fade" id="adminLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Enter your username here">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter your password here">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
 <?php
   if(isset($_POST['submit'])){
      $count=0;
      $result=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");

      $row= mysqli_fetch_assoc($result);
      $count=mysqli_num_rows($result);

      if($count==0){
          ?>

          <script type="text/javascript">
              alert("The username and password doesn't match. Try again");
           </script>

        <?php
        }
     else{
      /*------ if username and password matches------*/
         $_SESSION['login_user']=$_POST['username'];
         $_SESSION['pic'] =$row['pic'];
         ?>
         <script type="text/javascript">
            window.location="index.php";
         </script>
         <?php
        }

}
?>
</div>