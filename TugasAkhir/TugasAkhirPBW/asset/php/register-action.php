<?php
    require "db-config.php";

    function sanitizeInput($input) {
        // Remove HTML tags and encode special characters
        $sanitized_input = htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
        return $sanitized_input;
    }

    function isValidFullName($full_name) {
        // Validate full name (example: letters, spaces, and hyphens allowed)
        if(!preg_match('/^[a-zA-Z\s-]+$/', $full_name)){
            return false;
        }
        return true;
    }

    function isValidUsername($username) {
        // Validate username (example: alphanumeric, 4-20 characters)
        if(!preg_match('/^[a-zA-Z0-9]{4,20}$/', $username)){
            return false;
        }
        return true;
    }

    function isValidPassword($password) {
        // Validate password (example: at least 6 characters)
        if(strlen($password) < 6){
            return false;
        }
        return true;
    }

    if(isset($_POST["register"])){
        $full_name = sanitizeInput($_POST["full_name"]);
        $username = sanitizeInput($_POST["username"]);
        $password = sanitizeInput($_POST["password"]);
        $confirm_password = sanitizeInput($_POST["confirm_password"]);

        // Input validation
        if(empty($full_name) || empty($username) || empty($password) || empty($confirm_password)){
            echo "
                <script>
                alert('Please fill in all fields');
                document.location.href = '../../register.php';
                </script>
            ";
            exit; // Stop further execution
        }

        // Validate full name
        if(!isValidFullName($full_name)){
            echo "
                <script>
                alert('Invalid full name. Please use letters, spaces, and hyphens only');
                document.location.href = '../../register.php';
                </script>
            ";
            exit; // Stop further execution
        }

        // Validate username
        if(!isValidUsername($username)){
            echo "
                <script>
                alert('Invalid username. Please use alphanumeric characters (4-20 characters)');
                document.location.href = '../../register.php';
                </script>
            ";
            exit; // Stop further execution
        }

        // Validate password
        if(!isValidPassword($password)){
            echo "
                <script>
                alert('Invalid password. Password should be at least 6 characters');
                document.location.href = '../../register.php';
                </script>
            ";
            exit; // Stop further execution
        }

        // Check if password matches confirm password
        if($password !== $confirm_password){
            echo "
                <script>
                alert('Passwords do not match');
                document.location.href = '../../register.php';
                </script>
            ";
            exit; // Stop further execution
        }

        // Check if username is already taken
        $check_query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $check_query);
        if(mysqli_num_rows($result) > 0){
            echo "
                <script>
                alert('Username already exists. Please choose a different username');
                document.location.href = '../../register.php';
                </script>
            ";
            exit; // Stop further execution
        }

        $query = "INSERT INTO users VALUES('', '$full_name','$username','$password', '', '','','','','user')";
        mysqli_query($conn, $query);

        // check if query successful
        if(mysqli_affected_rows($conn) > 0){
            $_SESSION['session_username'] = "";
            $_SESSION['session_password'] = "";

            $cookie_name = "cookie_username";
            $cookie_value = "";
            $time = time() - (60 * 60);
            setcookie($cookie_name, $cookie_value, $time, "/");

            $cookie_name = "cookie_password";
            $cookie_value = "";
            $time = time() - (60 * 60);
            setcookie($cookie_name, $cookie_value, $time, "/");

            echo "
                <script>
                alert('Successfully Registered');
                document.location.href = '../../login.php';
                </script>
            ";
        }else{
            echo "
                <script>
                alert('Failed to Register');
                document.location.href = '../../register.php';
                </script>
            ";
        }    
    }
?>


