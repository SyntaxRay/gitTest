<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit User</title>
<style>
    body {
        font-family: Calibri, Helvetica, sans-serif;
        background-color: #EFD5CF;
    }

    button {
        padding: 10px 20px;
        margin: 20px auto 0 auto;
        border: none;
        border-radius: 3px;
        background-color: #7963B6;
        color: white;
        cursor: pointer;
        display: block;
    }

    form {
        border: 3px solid #f1f1f1;
        width: 500px; 
        margin: 0 auto; 
        padding: 60px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        margin: 8px 0;
        padding: 12px 20px;
        display: inline-block;
        border: 2px solid green;
        box-sizing: border-box;
        border-radius: 5px;
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
        border-radius: 10px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-top: 10px;
        color: #333;
        font-weight: bold;
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['status']) && isset($_POST['course'])) {
            $id = mysqli_real_escape_string($connect, $_POST['id']);
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            $status = mysqli_real_escape_string($connect, $_POST['status']);
            $course = mysqli_real_escape_string($connect, $_POST['course']);

            $query = "UPDATE tblogin SET username='$username', password='$password', status='$status', course='$course' WHERE id='$id'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                header("Location: adminpage.php");
                exit;
            } else {
                echo "Error updating record: " . mysqli_error($connect);
            }
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tblogin WHERE id='$id'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            $user = mysqli_fetch_assoc($result);
        } else {
            echo "Error fetching user details: " . mysqli_error($connect);
        }
    }
    ?>

    <div class="container">
        <h1>Edit Info User</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>"><br><br>
            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>"><br><br>
            <label>Status:</label>
            <input type="text" name="status" value="<?php echo $user['status']; ?>"><br><br>
            <label>Course:</label>
            <input type="text" name="course" value="<?php echo $user['course']; ?>"><br><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php
// Close connection
mysqli_close($connect);
?>
