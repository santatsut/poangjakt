<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/BackEnd/Handlers/AppHandler.php';
include_once App::$_Redirect["HANDLERS"] .'TaskHandeler.php'; 
include_once App::$_Redirect["FUNCTIONS"] .'addTask.php';
?>

<form method="post">
    <input type="text" name="Uppgift" placeholder="Uppgift" required>
    <input type="text" name="Poäng" placeholder="Poäng" required>
    <input type="text" name="Lag" placeholder="Lag" required>
    <input type="submit" name="addTask" value="Lägg Till Uppgift">
</form>
<link rel="stylesheet" href="AddTask.css">
<?php include_once App::$_Redirect["FUNCTIONS"] .'Table.php'; ?>

<script src="../../../../index.js"></script>
<script>
    loadForm()
</script>