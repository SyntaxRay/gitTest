<?php
session_start();

$servername ="localhost";
$database ="dbpbt2";
$username ="root";
$password ="";

$connect = mysqli_connect($servername, $username, $password, $database);

if(!$connect){
    die("Connection Error!:" . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = mysqli_prepare($connect, "DELETE FROM tblogin WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $user_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid request.";
}

header("Location: adminpage.php"); 
exit();
?>