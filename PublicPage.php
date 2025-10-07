<?php include_once './BackEnd/Handlers/AppHandler.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./frontendCSS/style.css">
    <link rel="stylesheet" href="./frontendCSS/blockStyle.css">
    <title>Document</title>
</head>

<body>
    <?php include_once APP::$_Redirect["FUNCTIONS"] . 'SetPoints.php'; ?>

    <div id="navbar">
        <img id="logoImage" src="./images/Logo_Black.svg" alt="">
        <h1>Poäng Jakt</h1>
    </div>
    <!-- background blocks  -->
    <div>
        <div class="block" id="block1"></div>
        <div class="block" id="block2"></div>
        <div class="block" id="block3"></div>
        <div class="block" id="block4"></div>
        <div class="block" id="block5"></div>
        <div class="block" id="block6"></div>
        <div class="block" id="block7"></div>
        <div class="block" id="block8"></div>
        <div class="block" id="block9"></div>
        <div class="block" id="block10"></div>
        <div class="block" id="block11"></div>
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