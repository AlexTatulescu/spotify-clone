<?php
include("includes/includedFiles.php");
?>

<div class = "userDetails">

    <div class="container borderBottom">
        <h2>EMAIL</h2>
        <input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail(); ?>">
        <span class="message"></span>
        <button class="button" onclick="updateEmail('email')">Save</button>
    </div>

    <div class="container">
        <h2>PASSWORD</h2>
        <input type="password" class="oldPassword" name="oldPassword" placeholder="Current password">
        <input type="password" class="newPassword1" name="newPassword1" placeholder="New password">
        <input type="password" class="oldPassword2" name="oldPassword2" placeholder="Confirm password">
        <span class="message"></span>
        <button class="button" onclick="updatePassword('oldPassword','newPassword1','oldPassword2')">Save</button>
    </div>

</div>
