<script src="/index.js"></script>
<?php

include_once 'AppHandler.php';
App::logout();
header('Location: adminLogin.php');
exit;
