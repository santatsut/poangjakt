<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';?>

<?php
$List = DB::getData();
?>


<div id="leftSide">
    <div id="leftSideInner">
        <h2>Teknik</h2>
        <h1><?php echo $List[0][1]['Poäng']; ?></h1>
    </div>
</div>
<div id="rightSide">
    <div id="rightSideInner">
        <h2>Estet</h2>
        <h1><?php echo $List[0][0]['Poäng']; ?></h1>
    </div>
</div>