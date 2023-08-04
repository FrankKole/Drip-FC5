<-- signup.php -->
<?php
if ($_SERVER[“REQUEST_METHOD”] == “POST”) {
    $email = $_POST[“email”];
    $password = password_hash($_POST[“password”], PASSWORD_DEFAULT);
    // Connect to the database
    $conn = new mysqli(“localhost”, “your_db_username”, “your_db_password”, “your_db_name”);
// Check connection
    if ($conn->connect_error) {
        die(“Connection failed: ” . $conn->connect_error);
    }
    // Insert user data into the database
    $sql = “INSERT INTO users (email, password) VALUES (‘$email’, ‘$password’)“;
    if ($conn->query($sql) === TRUE) {
        echo “Signup successful!“;
    } else {
        echo “Error: ” . $sql . “<br>” . $conn->error;
    }
    $conn->close();
}
?>