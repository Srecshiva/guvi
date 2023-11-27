<?php
// MongoDB connection parameters
$mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$database = $mongoClient->selectDatabase('users');
$collection = $database->selectCollection('user_profiles');

/
$userID = $_SESSION['user_id']; 
// Find user profile details from MongoDB based on the user ID
$userProfile = $collection->findOne(['user_id' => $userID]);

if ($userProfile) {
    
    header('Content-Type: application/json');
    echo json_encode($userProfile);
} else {
    // Handle if user profile not found
    http_response_code(404);
    echo json_encode(array("message" => "User profile not found"));
}
?>
