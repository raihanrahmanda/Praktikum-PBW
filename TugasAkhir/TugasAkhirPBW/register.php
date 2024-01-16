<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/register-style.css">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>CatchAW Form Register Page</title>
</head>

<body>
    <div class="title">
        <h1>Small Moves for Bigger Changes</h1>
    </div>
    <div class="wrapper">
        <form action="asset/php/register-action.php" method="post">
            <div class="field">
                <input type="text" name="full_name" required>
                <label>Full Name</label>
            </div>
            <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" id="myInput1" required>
                <span class="eye" onclick="showHidePW()">
                    <i id="hide1" class="far fa-eye" style="color: #aaa;"></i>
                    <i id="hide2" class="far fa-eye-slash" style="color: #aaa;"></i>
                </span>
                <label for="myInput1">Password</label>
            </div>
            <div class="field">
                <input type="password" name="confirm_password" id="myInput2" required>
                <span class="eye" onclick="showHidePW2()">
                    <i id="hide3" class="far fa-eye" style="color: #aaa;"></i>
                    <i id="hide4" class="far fa-eye-slash" style="color: #aaa;"></i>
                </span>
                <label for="myInput2">Rewrite Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me" required>
                    <label for="remember-me">Agree to CatchAW </label>
                    <span onclick="togglePopup('popup-1')" style="color: #3a7bd5;">Game Rules</span>
                    <div class="popup" id="popup-1">
                        <div class="overlay"></div>
                        <div class="content">
                            <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                            <div class="content-box">
                                <h1>CatchAW Game Rules</h1>
                                <ol>
                                    <li>Users are expected to provide truthful and accurate personal information when
                                        registering and using CatchAW. This is intended to build trust among users and
                                        ensure compatibility with search criteria.</li>
                                    <li>Users are expected to use the CatchAW search feature appropriately and according
                                        to
                                        their needs. This helps in finding competition partners who meet specific
                                        criteria
                                        and maximizes the chances of successful collaboration.</li>
                                    <li>When interacting with other users on CatchAW, it is important to maintain polite
                                        and
                                        respectful communication. Avoid using offensive language, teasing, or
                                        inappropriate
                                        behavior. Encourage mutually beneficial and respectful cooperation among users.
                                    </li>
                                    <li>Privacy and Security: Users are expected to safeguard their own privacy and
                                        personal
                                        information. Avoid sharing sensitive or personal information with other users
                                        unless
                                        necessary in the context of competition collaboration.</li>
                                    <li>If users encounter inappropriate behavior, spam, or other violations of
                                        CatchAW's
                                        rules, it is important to report them to the administrator or manager of
                                        CatchAW. By
                                        reporting, you help maintain the integrity and quality of CatchAW usage.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <input type="submit" name="register" value="Sign-up">
            </div>
            <div class="login-link">
                Already on CatchAW? <a href="login.php" style="color: #3a7bd5;">Login now!</a>
            </div>
        </form>
    </div>
    <script src="asset/js/register.js"></script>
</body>

</html>