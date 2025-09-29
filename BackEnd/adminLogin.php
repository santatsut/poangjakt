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

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="submitAdmin" value="Login">
</form>

<?php if (!empty($error)) {
    echo "<p style='color:red;'>$error</p>";
} ?>
