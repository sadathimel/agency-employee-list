<?php
// Include your database connection code here
include('connect.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$phone = $_POST['phone'];

// Check if the phone number already exists in the database
$sql = "SELECT * FROM employees WHERE phone = '$phone'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Phone number already exists in the database.";
} else {
    echo "";
}

mysqli_close($conn);
?>