<?php

$json = file_get_contents('data.json');

$myfile = fopen('data.json', 'w');
$List = json_decode($json, true); // decode as associative array
function GetValues(&$List, $type)
{
    $Poäng = 0;
    foreach ($List[1] as &$row) {
        if ($row['avklarad'] == true && (string) $row['lag'] === $type && $row['Checked'] == false) {
            echo 'hi';

            $Poäng += $row['Poäng'];
            $row['Checked'] = true;
        }
    }

    return [$Poäng, $List];
}
[$P,$List] = GetValues($List, 'Es');
$List[0][0]['Poäng'] += $P;
[$P,$List] = GetValues($List, 'Te');
$List[0][1]['Poäng'] += $P;
file_put_contents('data.json', json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
fclose($myfile);
