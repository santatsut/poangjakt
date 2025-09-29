<?php

$json = file_get_contents('data.json') ?: '[]';
$List = json_decode($json, true) ?: [];

if (isset($_POST['addTask'])) {
    $Task = [
        'Uppgift' => $_POST['Uppgift'] ?? '',
        'lag' => $_POST['Lag'] ?? '',
        'Poäng' => $_POST['Poäng'] ?? '0',
        'avklarad' => false,
        'Checked' => false,
    ];

    $List[1][] = $Task;
    file_put_contents('data.json', json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
