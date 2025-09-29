<?php

$json = file_get_contents(__DIR__.'/data.json') ?: [];
$List = json_decode($json, true) ?: [];

if (isset($_POST['done'])) {
    $taskId = $_POST['done'];
    foreach ($List as &$row) {
        if (($row['Uppgift'] ?? '') === $taskId) {
            $row['avklarad'] = true;
        }
    }
    file_put_contents('../data.json', json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}
