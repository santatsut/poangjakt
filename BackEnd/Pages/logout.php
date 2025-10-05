<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/BackEnd/Handlers/AppHandler.php';
App::logout();
header('Location: adminLogin.php');
exit;
