<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="navbar">
        <h1>Poäng Jakt</h1>
        <p>Detta är Poängen just nu</p>
    </div>
    <div id="content">
        <?php include_once 'Progress.php'; ?>
        <div id="bottomSide">
            <?php include_once 'Table.php'; ?>
        </div>
    </div>
</body>
</html>
