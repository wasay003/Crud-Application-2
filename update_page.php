<?php require('session_include.php'); ?>
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
     if(isset($_GET['id'])){
        $id =  $_GET['id'];
     
        $query = "select * from `students` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }
        else{
           
            $row = mysqli_fetch_assoc($result);

           
        }                 
     
    }

?>


      <?php


                if(isset($_POST['update_students'])){


                    if(isset($_GET['id_new'])){
                        $idnew = $_GET['id_new'];
                    }


                    $fname = $_POST['first_name'];
                    $lname = $_POST['last_name'];
                    $age = $_POST['age'];

                    $query = "update `students` set `first_name` = '$fname', `last_name` = '$lname', `age` = '$age'   where `id` = '$idnew'";

                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die("query failed".mysqli_error());
                    }
                    else{
                        header('location:index.php');
                    }
                }



?>
<div class="container">
    <h2>Update Student</h2>
<form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo ($row['first_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name"value="<?php echo ($row['last_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo ($row['age']); ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="update_students">Update Student</button>
    </div>
    </form>



<?php include('footer.php'); ?>