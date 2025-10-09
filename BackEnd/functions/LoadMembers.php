<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';
$ListOfMembers = Accounts::$accounts;
foreach ($ListOfMembers as $member) {
    echo '<div class="memberRow">
    <p class="memberUsername">Username: '.$member->get_Username().'</p>
    <p class="memberPassword">Password: '.
    ($passwordDisplay = ($_SESSION['Logged_User'] == $member)
    ? $member->get_Password()
    : '********').'</p>
</div>';
}
