<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Account</title>

    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: #EFD5CF;
        }

        .container {
            padding: 25px;
            background-color: #CBC3E3;
            text-align: center;
        }

        form {
            border: 3px solid #f1f1f1;
            max-width: 500px;
            margin: 0 auto;
            padding: 60px;
            background-color: #CBC3E3;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 3px;
            background-color: #7963B6;
            color: white;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.7;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <center><h1>Register Form</h1></center>
    <form method="post" action="dbpbt2.php">
        <div class="container">
            <button type="button"><a href="LectRegister.php">Create New Account for Lecturer</a></button>
            <button type="button"><a href="AdminRegister.php">Create New Account for Admin</a></button>
            <button type="button"><a href="StudRegister.php">Create New Account for Student</a></button>
        </div>
    </form>
</body>
</html>
