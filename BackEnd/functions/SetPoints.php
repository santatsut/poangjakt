<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';?>
<?php

$jsonPath = APP::$_Redirect["STORAGE"].'/data.json';
$json = file_get_contents($jsonPath);
$List = json_decode($json, true) ?: []; // decode as associative array

function GetValues(&$List, $type)
{
    $Poäng = 0;

    foreach ($List[1] as &$row) { // loop all tasks
        if (
            !empty($row['avklarad'])
            && (string) ($row['lag'] ?? '') === $type
            && empty($row['Checked'])
        ) {
            $Poäng += (int) ($row['Poäng'] ?? 0);
            $row['Checked'] = true;
        }
    }

    return [$Poäng, $List];
}

// Example: Add points to some summary (assuming $List[0] exists)
[$P, $List] = GetValues($List, 'Es');
if (isset($List[0][0]['Poäng'])) {
    $List[0][0]['Poäng'] += $P;
}

[$P, $List] = GetValues($List, 'Te');
if (isset($List[0][1]['Poäng'])) {
    $List[0][1]['Poäng'] += $P;
}

// Save back to file
file_put_contents($jsonPath, json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
