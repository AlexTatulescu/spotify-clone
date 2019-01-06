<html>
<head>
    <title>Welcome to Slotify!</title>
</head>
<body>
<div id="inputContainer">
    <form id="loginForm" action="register.php" method="post">
        <h2>Login to your account</h2>
        <P>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
        </P>
        <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
        </p>
        <button type="submit" name="loginButton">LOG IN</button>
    </form>

    <form id="registerForm" action="register.php" method="post">
        <h2>Create your free account</h2>
        <P>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="e.g. bartSimpson" required>
        </P>
        <P>
            <label for="firstName">First name</label>
            <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" required>
        </P>
        <P>
            <label for="lastName">Last name</label>
            <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" required>
        </P>
        <P>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="e.g. bart_simpson@gmail.com" required>
        </P>
        <P>
            <label for="email2">Confirm email</label>
            <input id="email2" name="email2" type="email" placeholder="e.g. bartSimpson" required>
        </P>
        <p>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Your password" required>
        </p>
        <p>
            <label for="password2">Confirm password</label>
            <input id="password2" name="password2" type="password" placeholder="Your password" required>
        </p>
        <button type="submit" name="registerButton">SIGN UP</button>
    </form>
</div>
</body>
</html>