<?php
// Include your database connection code here
include('connect.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];

// Check if the email already exists in the database
$sql = "SELECT * FROM employees WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Email already exists in the database.";
} else {
    echo "";
}

mysqli_close($conn);
?>