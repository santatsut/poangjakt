<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';
$ListOfMembers = Accounts::$accounts;
foreach ($ListOfMembers as $member) {
    echo '<div class="memberRow">';
    if ($member == $_SESSION['Logged_User']) {
        echo '<p class="memberUsername" style="color: lightgreen; text-decoration: underline;">Username: '.$member->get_Username().'</p>';
    } else {
        if (DB::_IsSuper($member)) {
            echo '<p class="memberUsername" style="color: lightblue; font-weight:1000 !important;">Username: <b>'.$member->get_Username().'</b></p>';
        } else {
            echo '<p class="memberUsername">Username: '.$member->get_Username().'</p>';
        }
    }
    echo '<p class="memberPassword">Password: '.
    ($passwordDisplay = ($_SESSION['Logged_User'] == $member || DB::_IsSuper($_SESSION['Logged_User']))
    ? $member->get_Password()
    : $member->get_Encrypted_Password()).'</p>
</div>';
}
