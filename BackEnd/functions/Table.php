<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';?>

<table id="TableForTasks">
<tr>
    <th>Uppgift</th>
    <th>Poäng</th>
    <th>Lag</th>
    <th class="FormTh"></th> <!-- for Done button -->
</tr>
<?php
$List = DB::getData();
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