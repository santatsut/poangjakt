<table id="TableForTasks">
<tr>
    <th>Uppgift</th>
    <th>Poäng</th>
    <th>Lag</th>
    <th></th> <!-- for Done button -->
</tr>
<?php
$json = file_get_contents('data.json') ?: '[]';
$List = json_decode($json, true) ?: [];

foreach ($List[1] as $row) {
    $style = !empty($row['avklarad']) ? 'text-decoration: line-through;' : '';
    echo '<tr style="'.$style.'">';
    echo '<td class="UppgiftTd">'.htmlspecialchars($row['Uppgift'] ?? '').'</td>';
    echo '<td>'.htmlspecialchars($row['Poäng'] ?? '0').'p</td>';
    echo '<td>'.htmlspecialchars($row['lag'] ?? '').'</td>';
    echo '<td class="FormTd"></td>';
    echo '</tr>';
}
?>
</table>
