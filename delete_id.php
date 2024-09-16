<?php include('dbcon.php'); ?>
<?php require('session_include.php'); ?>



<?php
     if(isset($_GET['id'])){
        $id = $_GET['id'];
     
    $query = "delete from `students` where `id` = '$id'";

    $result = mysqli_query($connection, $query);
     
     if(!$result){
        die("Query Failed".mysqli_error());
     }
     else{
        header('location:index.php');
     }
}

     ?>
