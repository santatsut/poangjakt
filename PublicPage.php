<?php include_once './BackEnd/Handlers/AppHandler.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once APP::$_Redirect["FUNCTIONS"] . 'SetPoints.php'; ?>

    <div id="navbar">
        <img id="logoImage" src="./images/Logo_Black.svg" alt="">
        <h1>Poäng Jakt</h1>
    </div>
    <div id="content">

        <?php include_once APP::$_Redirect["FUNCTIONS"] . 'Progress.php'; ?>

        <div id="bottomSide">
            <?php include_once APP::$_Redirect["FUNCTIONS"] . 'Table.php'; ?>
        </div>
    </div>
</body>

</html>
<script>
    const td = document.querySelectorAll('.FormTd');
    const th = document.querySelectorAll('.FormTh');
    th.forEach(element => {
        element.style.display = 'none';
    });

    td.forEach(element => {
        element.style.display = 'none';
    });
</script>