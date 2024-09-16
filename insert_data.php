<?php
include ('dbcon.php');
require('session_include.php'); 
if(isset($_POST['add_students'])){

   $f_name = trim($_POST['first_name']);
   $l_name = trim($_POST['last_name']);
   $age = trim($_POST['age']);

  if((empty($f_name)) || empty($l_name)){
 
    header("Location:add_student.php?error=emptyfields");
   
        exit();
  }
  function specialChars($str)
  {
      return preg_match('/[^a-zA-Z]/', $str) > 0;
  }
  
  if (specialChars($f_name) || specialChars($l_name)) {
    header("location:add_student.php?error=Names has special characters or numbers");
    exit();
}
  

  if (empty($age)) {
    header("location:add_student.php?error=Age is empty");
    exit();
} 
else if (!is_numeric($age)) {
    header("location:add_student.php?error=Age should be a number");
    exit();
} 
else if ((int)$age <= 0) {
    header("location:add_student.php?error=Age must be a non-negative number");
    exit();
}
    


  $query = "insert into `students` (`first_name`, `last_name`,`age`) values ('$f_name', '$l_name', '$age')";
  $result = mysqli_query($connection,$query);

  if(!$result){
    die("Query failed");
  }
  else{
    header('location:index.php');
  }




}











?>