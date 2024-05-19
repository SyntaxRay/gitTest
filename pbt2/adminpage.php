<!DOCTYPE html>   
<html>   
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Admin Page</title>  
    <style>   
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: #EFD5CF;
            margin: 0;
            padding: 0;
        }

        button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 3px;
            background-color: #7963B6;
            color: white;
            cursor: pointer;
        }

        form {
            border: 3px solid #f1f1f1;
            max-width: 500px;
            margin: 0 auto;
            padding: 60px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }

        button:hover {
            opacity: 0.7;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            margin: 10px 5px;
        }

        .container {
            padding: 25px;
            background-color: #CBC3E3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto; /* Center the table horizontally */
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #7963B6;
            color: white;
        }
    </style>   
</head>    

<body>
    <?php
    session_start();

    $servername = "localhost";
    $database = "dbpbt2";
    $username = "root";
    $password = "";

    $connect = mysqli_connect($servername, $username, $password, $database);

    if (!$connect) {
        die("Connection Error!:" . mysqli_connect_error());
    }

    if (!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }

    $query = "SELECT * FROM tblogin WHERE role='Admin'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die('Failed to fetch users:' . mysqli_error($connect));
    }
    ?>

    <div class="container">
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <table>
            <tr>
                <th>Bil</th>
                <th>User</th>
                <th>Password</th>
                <th>Status</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td><?php echo htmlspecialchars($row['course']); ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo htmlspecialchars($row['id']); ?>"
                           onclick="return confirm('Are you sure you want to delete this user?');">Delete</a><br>
                        <a href="edit.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table><br>
        <center><input type="button" value="Logout" name="logout" onclick="location.href='logout.php';"></center>
    </div>
</body>
</html>
