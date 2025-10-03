<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once './BackEnd/SetPoints.php'; ?>

    <div id="navbar">
        <img id="logoImage" src="Logo_Black.svg" alt="">
        <h1>Poäng Jakt</h1>
    </div>
    <div id="content">

        <?php include_once './BackEnd/Progress.php'; ?>
        
        <div id="bottomSide">
            <?php include_once './BackEnd/Table.php'; ?>
        </div>
    </div>
</body>

</html>