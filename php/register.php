<?php
if (isset($_POST['username'] , $_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
$conn = new mysqli("localhost", "root", "", "users");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve registration form data using POST method
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password for security before storing it
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert user data into the MySQL database

$stmt = $conn->prepare("INSERT INTO  users (username, email, password) VALUES (?,?,?)");
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if ($stmt->execute()) {
    
    $user_id = $stmt->insert_id; 

    
    $mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$database = $mongoClient->selectDatabase('users');
$collection = $database->selectCollection('user_profiles');

  
    $userProfileData = [
        "user_id" => $user_id,
        "age" => null, 
        "dob" => null,
        "contact" => [
            "phone" => null,
            "address" => null
        ]
        
    ];

    $collection = $mongoDatabase->selectCollection('user_profiles');
    $collection->insertOne($userProfileData);

    echo "Registration successful";
} else {
    // Registration failed
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
}
?>
