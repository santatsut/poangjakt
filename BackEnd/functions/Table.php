<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';?>

<form method="post" id="formToAddTask">
<table id="TableForTasks">
<tr>
    <th>Uppgift</th>
    <th>Poäng</th>
    <th>Lag</th>
    <th class="FormTh"></th> <!-- for Done button -->
</tr>
<tr class="FormTd">
            <td>
                <input type="text" name="Uppgift" placeholder="Uppgift" required>
            </td>
            <td>
                <input type="text" name="Poäng" placeholder="Poäng" required>
            </td>
            <td>
                <input type="text" name="Lag" placeholder="Lag" required>
            </td>
            <td>
                <input type="submit" name="addTask" value="Lägg Till">
            </td>
        </tr>
<?php
$List = DB::getData();
foreach ($List[1] as $row) {
    $style = !empty($row['avklarad']) ? 'text-decoration: line-through;' : '';
    echo '<tr id="Row" style="'.$style.'">';
    echo '<td class="UppgiftTd">'.$row['Uppgift'] ?? '</td>';
    echo '<td>'.$row['Poäng'] ?? '0p</td>';
    echo '<td>'.$row['lag'] ?? '</td>';
    echo '<td class="FormTdButton"></td>';
    echo '</tr>';
}
?>
</table>
</form>
