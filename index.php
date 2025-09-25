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
        <div id="leftSide">
            <h2>Teknik</h2>
            <h1>100</h1>
        </div>
        <div id="rightSide">
            <h2>Estet</h2>
            <h1>99</h1>
        </div>
        <div id="bottomSide">
            <?php include_once 'Table.php'; ?>
        </div>
    </div>
</body>
</html>
