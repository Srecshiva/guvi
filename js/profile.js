
function fetchUserProfile() {
    $.ajax({
        url: 'profile.php', // Your server endpoint to fetch profile details
        method: 'GET',
        success: function (data) {
            // Process the received data (user profile details)
            displayUserProfile(data);
        },
        error: function (error) {
            console.error('Error fetching user profile:', error);
        }
    });
}

// Function to display user profile details on the web page
function displayUserProfile(profileData) {
    
    $('#username').text(profileData.username);
    $('#email').text(profileData.email);
    $('#age').text(profileData.age);
   
}

// Call the function to fetch and display user profile details
fetchUserProfile();
