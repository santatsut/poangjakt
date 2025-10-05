<?php
// VERY TOP: no whitespace before this
include_once 'AppHandler.php';

// Optional: start output buffering to prevent accidental output
ob_start();

$jsonFile = __DIR__ . '/data.json';
$json = file_get_contents($jsonFile) ?: '[]';
$List = json_decode($json, true) ?: [];

if (isset($_POST['done'])) {
    $taskId = $_POST['done'];

    if (isset($List[1])) {
        foreach ($List[1] as &$row) {
            if (($row['Uppgift'] ?? '') === $taskId) {
                $row['avklarad'] = true;
            }
        }
    }

    // Save updated JSON
    file_put_contents($jsonFile, json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Redirect
    header('Location: ' . App::$_Redirect['ADMIN_PAGE']);
    exit;
}

// Flush output buffer if you used ob_start()
ob_end_flush();
