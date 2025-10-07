<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/BackEnd/Handlers/AppHandler.php';
include_once App::$_Redirect["HANDLERS"] .'TaskHandeler.php'; 
include_once App::$_Redirect["FUNCTIONS"] .'addTask.php';
?>

<html style="::webkit-scrollbar {display: none;}">
    <div id="addTaskContainer">
        <?php include_once App::$_Redirect["FUNCTIONS"] .'Table.php'; ?>
        
    </div>
    <link rel="stylesheet" href="AddTask.css">

<script src="../../../../index.js"></script>
<script>
    loadForm()
</script>
</html>