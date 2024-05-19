<?php
session_start();

$servername = "localhost";
$database = "dbpbt2";
$username = "root";
$password = "";

$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Connection Error!: " . $connect->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user_name'], $_POST['password'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $stmt = $connect->prepare("SELECT * FROM tblogin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $user_name, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            switch ($row['role']) {
                case 'Student':
                    header("Location: studentpage.php");
                    break;
                case 'Admin':
                    header("Location: adminpage.php");
                    break;
                case 'Lecturer':
                    header("Location: lecturerpage.php");
                    break;
                default:
                    echo "Invalid role!";
            }
            exit();
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
    }
}

$connect->close();
?>
