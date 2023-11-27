<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
function register(){
    $(document).ready(function() {
 
        
        // Gather registration form data
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();

        // AJAX call for registration
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: {
                username: username,
                email: email,
                password: password
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                
                alert('Registration successful. Please login.');
                // Redirect to login page after successful registration
                window.location.href = 'login.html';
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(error);
                alert('Registration failed. Please try again.');
            }
        });
    });
};
