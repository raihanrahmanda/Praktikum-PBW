<?php
    session_start();
    require "asset/php/db-config.php";
    
    if (!isset($_SESSION['session_username'])) {
        header("location: login.php");
        exit();
    }
    
    // Get user id
    $username = $_SESSION['session_username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $stmt = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($stmt);
    
    $userId = $row['id'];
    $userUsername = $row['username'];
    
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $message = $_POST["message"];
        
        // Validate input
        $errors = array();
        
        // Validate name
        if (empty($name)) {
            $errors[] = "Name is required.";
        } else {
            // Check for disallowed characters in the name
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
                $errors[] = "Invalid characters in the name.";
            }
        }
        
        // Validate message
        if (empty($message)) {
            $errors[] = "Message is required.";
        } else {
            // Check for disallowed characters in the message
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $message)) {
                $errors[] = "Invalid characters in the message.";
            }
        }
        
        // If there are no errors, insert into the database
        if (empty($errors)) {
            $query = "INSERT INTO feedback VALUES ('', '$userId', '$name', '$message')";
            $stmt = mysqli_query($conn, $query);
            
            echo "
            <script>
            alert('Successfully Added');
            document.location.href = 'contact.php';
            </script>
            ";
        } else {
            // Display errors
            foreach ($errors as $error) {
                echo "<p>Error: $error</p>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/header-login-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <link rel="stylesheet" href="asset/css/contact-style.css">
    <title>Mailbox - CatchAW</title>
</head>

<body>
    <?php
        include "asset/php/header-login.php";
    ?>    

    <div class="container">
        <div class="container-text">
            <h1>Let's Fly With Us</h1>
            <p>Thank you for visiting our website. If you have any questions, comments, or feedback, 
                we would love to hear from you. Please use the contact button below to get in touch with us, 
                and we will get back to you as soon as possible. We value your input and strive to provide a 
                seamless experience for our CatctAW community. Let's fly higher, mates.</p>
            <div class="container-button">
            <button onclick="location.href='mailto:222112303@stis.ac.id'"><span>E-mail</span></button>
            <button onclick="location.href='https://wa.me/6285156570260'"><span>WhatsApp</span></button>
            </div>
        </div>
        <div class="container-image">
            <img src="asset/image/picture5.svg" alt="Fly Higher">
        </div>
    </div>

    <?php
        $query = "SELECT * FROM users WHERE username = '$_SESSION[session_username]'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    ?>

    <div class="container2">
        <div class="container2-image">
            <img src="asset/image/picture6.svg" alt="Feedback">
        </div>
        <div class="container2-form">
            <h2>Feedback Form</h2>
            <?php if (!empty($errors)): ?>
                <div class="error-container">
                        <?php foreach ($errors as $error): ?>
                        <p style="color: red; margin-left: 10px;"><?php echo $error; ?></p>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['full_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                <button type="submit" name="submit"><span>Submit</span></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>