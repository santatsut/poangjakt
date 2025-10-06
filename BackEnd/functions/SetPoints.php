<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';?>
<?php


$List = DB::getData();

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
DB::WriteData($List);
