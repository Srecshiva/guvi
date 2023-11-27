<?php
session_start();

// MySQL connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve login form data using POST method
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to fetch user data based on email
$stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    // Successful login
    $_SESSION['user_id'] = $user['id']; 
    echo "Login successful"; 
    // Invalid credentials
    echo "Invalid email or password";
}
}
$stmt->close();
$conn->close();
?>
