<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($connection);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<html>
<head>
    <title>Welcome to Slotify!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php
    if(isset($_POST['registerButton'])) {
        echo '<script>
        $(document).ready(function () {
            $("#loginForm").hide();
            $("#registerForm").show();
        });
    </script>';
    }
    else{
        echo '<script>
        $(document).ready(function () {
            $("#loginForm").show();
            $("#registerForm").hide();
        });
    </script>';
    }
    ?>


    <div id="background">

        <div id="loginContainer">

            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="post">
                    <h2>Login to your account</h2>
                    <P>
                        <?php echo $account->getError(Constants::$LOGIN_FAILED); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername'); ?>" required>
                    </P>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>

                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form id="registerForm" action="register.php" method="post">
                    <h2>Create your free account</h2>
                    <P>
                        <?php echo $account->getError(Constants::$USERNAME_MIN_MAX_LENGTH); ?>
                        <?php echo $account->getError(Constants::$USERNAME_TAKEN); ?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" placeholder="e.g. bartSimpson"
                               value="<?php getInputValue('username'); ?>" required>
                    </P>
                    <P>
                        <?php echo $account->getError(Constants::$FIRST_NAME_MIN_MAX_LENGTH); ?>
                        <label for="firstName">First name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart"
                               value="<?php getInputValue('firstName'); ?>" required>
                    </P>
                    <P>
                        <?php echo $account->getError(Constants::$LAST_NAME_MIN_MAX_LENGTH); ?>
                        <label for="lastName">Last name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson"
                               value="<?php getInputValue('lastName'); ?>" required>
                    </P>
                    <P>
                        <?php echo $account->getError(Constants::$EMAILS_DO_NOT_MATCH); ?>
                        <?php echo $account->getError(Constants::$EMAIL_INVALID_FORMAT); ?>
                        <?php echo $account->getError(Constants::$EMAIL_TAKEN); ?>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="e.g. bart_simpson@gmail.com"
                               value="<?php getInputValue('email'); ?>" required>
                    </P>
                    <P>
                        <?php echo $account->getError(Constants::$EMAILS_DO_NOT_MATCH); ?>
                        <label for="email2">Confirm email</label>
                        <input id="email2" name="email2" type="email" placeholder="e.g. bartSimpson"
                               value="<?php getInputValue('email2'); ?>" required>
                    </P>
                    <p>
                        <?php echo $account->getError(Constants::$PASSWORDS_DO_NOT_MATCH); ?>
                        <?php echo $account->getError(Constants::$PASSWORD_NOT_ALPHANUMERIC); ?>
                        <?php echo $account->getError(Constants::$PASSWORD_MIN_MAX_LENGTH); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Your password" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$PASSWORDS_DO_NOT_MATCH); ?>
                        <label for="password2">Confirm password</label>
                        <input id="password2" name="password2" type="password" placeholder="Your password" required>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>

                </form>

            </div>

            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>

        </div>

    </div>
</body>
</html>