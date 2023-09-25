<?php
include('connect.php');
if (isset($_POST["create"])) {
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $hire_date = mysqli_real_escape_string($conn, $_POST["hire_date"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $sqlInsert = "INSERT INTO employees(first_name , last_name , email , phone,hire_date,department) VALUES ('$firstname','$last_name','$email', '$phone', '$hire_date', '$department')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Employee Added Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
if (isset($_POST["edit"])) {
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $hire_date = mysqli_real_escape_string($conn, $_POST["hire_date"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    
    $sqlUpdate = "UPDATE employees SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', hire_date = '$hire_date', department = '$department' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Employee Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>