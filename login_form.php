<?php include('dbcon.php'); ?>
<?php include('header.php');
 require('session_include.php'); ?>

<?php 
if(isset($_SESSION['username'])){
    header("location:index.php");
    exit();
}
?>  

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Login</h5>
                    </div>
                    <div class="card-body">
                        <form action="login_process.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="uname" class="form-control" id="username" placeholder="Enter your username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
if (isset($_GET['incorrect'])) {
    $errorMessage = $_GET['incorrect'];
    echo "<p style='color:red; text-align:center; width:100%; font-size: 26px'>" . $errorMessage . "</p>";
}
?>

<?php include('footer.php'); ?>