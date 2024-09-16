<?php require('session_include.php'); ?>
<?php include('header.php'); ?>
<div class="container">
    <h2>Add New Student</h2>
    <form action="insert_data.php" method="post">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <button type="submit" class="btn btn-primary" name="add_students">Add Student</button>
    </form>
</div>
<?php
if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo($error_message);
}
?>
<?php 
include('footer.php'); 
?>