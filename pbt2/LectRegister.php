<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Account</title>

    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: #EFD5CF;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 25px;
            background-color: #CBC3E3;
        }

        form {
            width: 500px;
            margin: 0 auto;
            padding: 40px;
            background-color: #CBC3E3;
            border: 3px solid #f1f1f1;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        button[type="submit"] {
            margin: 20px auto;
            display: block;
            width: 100px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #7963B6;
            color: #fff;
            font-weight: bold;
            outline: none;
        }

        button[type="submit"]:hover {
            background-color: rgb(23, 93, 162);
        }

        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $database = "dbpbt2";
    $username = "root";
    $password = "";

    $connect = mysqli_connect($servername, $username, $password, $database);

    if (!$connect) {
        die("Connection Error!:" . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmpassword'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $role = 'Lecturer'; // Hard-code the role to 'Student'

            if ($password === $confirmpassword) {
                $sql = "INSERT INTO tblogin (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

                if (mysqli_query($connect, $sql)) {
                    echo "<script> alert('Account created successfully! Redirecting to the login page.'); window.location.href = 'login.php'; </script>";
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                }
            } else {
                echo "<div class='error'>Passwords do not match!</div>";
            }
        }
    }

    mysqli_close($connect);
    ?>

    <center>
        <h1>Create New Account for Student</h1>
    </center>
    <form action="" method="POST" onsubmit="return validateForm()">
        <div>
            <label>Username:</label>
            <input type="text" placeholder="Insert Username" name="username" required>
        </div>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Insert Email" name="email" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password" name="password" required>
        </div>

        <div>
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
