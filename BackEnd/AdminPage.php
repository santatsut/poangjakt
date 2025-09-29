<script src="/index.js"></script>

<?php
include_once 'AppHandler.php';
if (!App::$IsLoggedIn) {
    header('Location: adminLogin.php');
    exit;
}

// Handle marking tasks as done
include_once 'adminHandler.php';

// Handle adding tasks
if (isset($_POST['addTask'])) {
    include_once 'addTask.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Poäng Jakt Admin</title>
</head>
<body>
<div id="navbar">
    <h1>Poäng Jakt ADMIN</h1>
    <p>Detta är Poängen just nu</p>
</div>
<div id="content">
    <div id="bottomSide">
        <form method="post">
            <input type="text" name="Uppgift" placeholder="Uppgift" required>
            <input type="text" name="Poäng" placeholder="Poäng" required>
            <input type="text" name="Lag" placeholder="Lag" required>
            <input type="submit" name="addTask" value="Lägg Till Uppgift">
        </form>

        <?php include_once 'Table.php'; ?>
    </div>
</div>
<script>
function loadForm() {
    const container = document.getElementsByClassName("FormTd");
    const table = document.getElementById("TableForTasks");
    Array.from(container).forEach((element, index) => {
        let form = document.createElement("form");
        form.method = "post";
        let button = document.createElement("button");
        button.type = "submit";
        button.name = "done";

        // use the Uppgift text from the same row
        let uppgiftCell = table.rows[index+1].querySelector(".UppgiftTd");
        button.value = uppgiftCell.textContent.trim();
        button.textContent = "Done";

        form.append(button);
        element.append(form);
    });
}
loadForm();
</script>
</body>
</html>
