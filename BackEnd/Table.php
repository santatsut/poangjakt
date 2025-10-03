<table id="TableForTasks">
<tr>
    <th>Uppgift</th>
    <th>Poäng</th>
    <th>Lag</th>
    <th></th> <!-- for Done button -->
</tr>
<?php
$jsonPath = __DIR__.'/data.json';
$json = file_get_contents($jsonPath);
$List = json_decode($json, associative: true) ?: []; // decode as associative array
foreach ($List[1] as $row) {
    $style = !empty($row['avklarad']) ? 'text-decoration: line-through;' : '';
    echo '<tr id="Row" style="'.$style.'">';
    echo '<td class="UppgiftTd">'.$row['Uppgift'] ?? '</td>';
    echo '<td>'.$row['Poäng'] ?? '0p</td>';
    echo '<td>'.$row['lag'] ?? '</td>';
    echo '<td class="FormTd"></td>';
    echo '</tr>';
}
?>
</table>