<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Employee Details</title>
    <style>
    .employee-details {
        background-color: #f5f5f5;
    }
    </style>
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Employee Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="employee-details p-5 my-4">
            <?php
            include("connect.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM employees WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>

            <h3>First Name:</h3>
            <p><?php echo $row["first_name"]; ?></p>
            <h3>Last Name:</h3>
            <p><?php echo $row["last_name"]; ?></p>
            <h3>Email:</h3>
            <p><?php echo $row["email"]; ?></p>
            <h3>Phone:</h3>
            <p><?php echo $row["phone"]; ?></p>
            <h3>Hire Date:</h3>
            <p><?php echo $row["hire_date"]; ?></p>
            <h3>Department:</h3>
            <p><?php echo $row["department"]; ?></p>

            <?php
                }
            }
            else{
                echo "<h3>No Employee found</h3>";
            }
            ?>

        </div>
    </div>
</body>

</html>