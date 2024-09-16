<?php require('session_include.php');  ?>
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php 
if(!isset($_SESSION['username'])){
    header("location:login_process.php");
    exit();
}
?>  

<div class="box-1">
<h2>ALL STUDENTS</h2>
<button class="btn btn-primary">    
     
    <a href="add_student.php" >ADD STUDENTS</a>
</button>

<button class="Logout">    
     
    <a href="login_form.php" onclick="logoutFunction()">Logout</a>
</button>


<script>

    function logoutFunction(){
             window.location.href = 'logout.php';
    }
</script>
</div>
        <table class = "table table-hover table-bordered table-striped rounded ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $query = "select * from `students`";

                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die("query failed".mysqli_error());
                    }
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                         <tr>
                    <td><?php echo $row['id']; ?></td>        
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                    <td><a href="delete_id.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                   
                </tr>

                           
                            <?php
                        }
                    }
                 ?>
               
                
            </tbody>
        </table>
        <?php
if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo($error_message);
}
?>

<?php include('footer.php'); ?>
