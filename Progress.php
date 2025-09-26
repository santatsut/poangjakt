<?php
$json = file_get_contents('data.json');
$List = json_decode($json, true); // decode as associative array
?>


<div id="leftSide">
    <h2>Teknik</h2>
    <h1><?php echo $List[0][1]['Poäng']; ?></h1>
</div>
<div id="rightSide">
    <h2>Estet</h2>
    <h1><?php echo $List[0][0]['Poäng']; ?></h1>
</div>