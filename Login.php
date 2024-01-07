<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve hashed password from the LOGIN table
    $sql = "SELECT * FROM LOGIN WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row["password"];

        // Verify the entered password against the stored hash
        if (password_verify($password, $storedHashedPassword)) {
            header("Location: index.html");
            
        } else {
            echo "Incorrect password";
            header("Location: register.html");
        }
    } else {
        echo "User not found";
    }
} else {
    echo "Form not submitted.";
}

mysqli_close($conn);
?>
