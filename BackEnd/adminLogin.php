<script src="/index.js"></script>

<?php
include_once 'AppHandler.php';

if (isset($_POST['submitAdmin'])) {
    $Account = new Account($_POST['username'], $_POST['password']);
    if (Accounts::checkAccount($Account)) {
        App::login();
        header('Location: AdminPage.php');
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>
<link rel="stylesheet" href="Loginpage.css">
<form method="post">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Enter username" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <?php if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    } ?>
    <input submit type="submit" name="submitAdmin" value="SIGN IN">

</form>


