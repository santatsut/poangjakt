<form method="post">
    <input type="text" name="Uppgift" placeholder="Uppgift" required>
    <input type="text" name="Poäng" placeholder="Poäng" required>
    <input type="text" name="Lag" placeholder="Lag" required>
    <input type="submit" name="addTask" value="Lägg Till Uppgift">
</form>
<link rel="stylesheet" href="AddTask.css">
<?php include_once '../Table.php'; ?>
<?php include_once '../TaskHandeler.php'; ?>
<script src="../../../index.js"></script>
<script>
    loadForm()
</script>