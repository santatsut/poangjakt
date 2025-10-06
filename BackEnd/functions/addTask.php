<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';?>
<?php

$List = DB::getData();
$Passed = false;
if (isset($_POST['addTask'])) {
    $Task = [
        'Uppgift' => $_POST['Uppgift'] ?? '',
        'lag' => $_POST['Lag'] ?? '',
        'Poäng' => $_POST['Poäng'] ?? '0',
        'avklarad' => false,
        'Checked' => false,
    ];
    foreach ($List[1] as $item) {
        if ($item['Uppgift'] != $_POST['Uppgift']) {
            $Passed = true;
        }
    }
    if (empty($List[1])) {
        $Passed = true;
    }
    if ($Passed == true) {
        $List[1][] = $Task;
        DB::WriteData($List);
    }else {
        echo "<h1>Task already exist</h1>";
    }
}
