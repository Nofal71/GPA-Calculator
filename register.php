<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the LOGIN table
    $sql = "INSERT INTO LOGIN (username, password) VALUES ('$username', '$hashedPassword')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful for username: $username";
        header("Location: Login.html");


    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form not submitted.";
}

mysqli_close($conn);
?>
