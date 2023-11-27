<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>


    function login(){
        $(document).ready(function() {
    
            
            // Gather login form data
            var email = $('#email').val();
            var password = $('#password').val();

            // AJAX call for login
            $.ajax({
                type: 'POST',
                url: 'login.php',
                data: {
                    email: email,
                    password: password
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    if(response=="Login successful")
                    // Redirect to profile page upon successful login
                    window.location.href = 'profile.html';
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                    alert('Login failed. Please check your credentials.');
                }
            });
        })
    };
