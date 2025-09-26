<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once 'SetPoints.php'; ?>

    <div id="navbar">
        <h1>Poäng Jakt</h1>
        <p>Detta är Poängen just nu</p>
    </div>
    <div id="content">

        <?php include_once 'Progress.php'; ?>
        <div id="bottomSide">
            <form method="post">
                <input type="text" name="Uppgift" placeholder="Uppgift" id="">
                <input type="text" name="Poäng" placeholder="Poäng" id="">
                <input type="text" name="Lag" placeholder="Lag" id="">
                <input type="submit" name="addTask" class="Submitter" value="Lägg Till Uppgift">
            </form>
            <?php include_once 'addTask.php'; ?>

            <?php include_once 'Table.php'; ?>
        </div>
    </div>
</body>

</html>