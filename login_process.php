<?php 
require('session_include.php');
include('dbcon.php'); 
?>



     <?php 
         if(isset($_POST['login_btn'])){
            $user = $_POST['uname'];
            $pass = $_POST['password'];
         }

         $query = "SELECT * from `users` where `username` = '$user' and `password` = '$pass'";
         $result = mysqli_query($connection, $query);


         if(!$result){
            echo "query failed";
         }

         else{
            $row = mysqli_num_rows($result);

            if((int)$row == 1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header("location:index.php");
                exit();
            }
            else{
                header("location:login_form.php?incorrect= Incorrect Username or Password");
                exit();

            }
         }


     ?>