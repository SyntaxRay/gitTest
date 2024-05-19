<!DOCTYPE html>   
<html>   
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Lecturer Page</title>
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
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center contents horizontally */
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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

        button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 3px;
            background-color: #7963B6;
            color: white;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.7;
        }

        .logout-btn {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #7963B6;
            color: white;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .logout-btn:hover {
            opacity: 0.7;
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

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }

    $query = "SELECT * FROM tblogin WHERE role='Lecturer'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die('Failed to fetch users: ' . mysqli_error($connect));
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
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['password']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <button onclick="location.href='logout.php';">Logout</button>
    </div>
</body>
</html>
