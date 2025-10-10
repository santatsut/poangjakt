<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';
?>
<html style="::webkit-scrollbar {display: none;}">
    <div id="ViewMembersContainer">
        <?php include_once App::$_Redirect['FUNCTIONS'].'LoadMembers.php'; ?>
        <form action="" method="post">
            <input type="text" name="Username" placeholder="Username" required>
            <input type="text" name="Password" placeholder="Password" required>
            <button id="AddMember" type="submit" name="AddMemberSubmit">Add Member</button>
        </form>
        <?php
        if (isset($_POST['AddMemberSubmit'])) {
            $NewMember = new Account($_POST['Username'], $_POST['Password']);
            $List = DB::getAdminData();
            $List[] = $NewMember;
            DB::WriteAdminData($List);
            header('Location:'.$_SERVER['PHP_SELF']);
        }

?>
    </div>
    <link rel="stylesheet" href="Members.css">

<script src="../../../../index.js"></script>
<script>
    loadForm()
</script>
</html>