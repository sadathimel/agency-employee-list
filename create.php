<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Agency employee information </title>
</head>

<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Add employee</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <form action="process.php" method="post">
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="first_name" placeholder="First Name:" required>
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name:" required>
            </div>
            <div class="form-elemnt my-4">
                <input type="email" class="form-control" name="email" id="email" placeholder=" Email:" required>
                <span id="emailError" style="color: red;"></span><br><br>
            </div>
            <div class="form-elemnt my-4">
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone:" required>
                <span id="phoneError" style="color: red;"></span><br><br>
            </div>
            <div class="form-elemnt my-4">
                <input type="date" class="form-control" name="hire_date" placeholder="Hire Date:" required>
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="department" placeholder="Department:" required>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Employee" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var emailInput = document.getElementById("email");
        var phoneInput = document.getElementById("phone");
        var emailError = document.getElementById("emailError");
        var phoneError = document.getElementById("phoneError");

        // Email validation function
        emailInput.addEventListener("input", function() {
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailRegex.test(emailInput.value)) {
                emailError.innerHTML = "Invalid email format";
            } else {
                emailError.innerHTML = "";
            }
        });

        // Phone number validation function
        phoneInput.addEventListener("input", function() {
            var phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phoneInput.value)) {
                phoneError.innerHTML = "Invalid phone number (10 digits)";
            } else {
                phoneError.innerHTML = "";
            }
        });
    });


    // check email and phone

    $(document).ready(function() {
        $('#email').blur(function() {
            var email = $(this).val();
            $.ajax({
                url: 'check_email.php',
                method: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    $('#emailError').html(response);
                }
            });
        });

        $('#phone').blur(function() {
            var phone = $(this).val();
            $.ajax({
                url: 'check_phone.php',
                method: 'POST',
                data: {
                    phone: phone
                },
                success: function(response) {
                    $('#phoneError').html(response);
                }
            });
        });
    });
    </script>
</body>


</html>