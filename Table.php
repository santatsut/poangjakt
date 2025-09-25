<table>
  <tr>
    <th>Uppgift</th>
    <th>Poäng</th>
    <th>Lag</th>
  </tr>
  <?php
  // Read file contents
  $json = file_get_contents('data.json');
  $List = json_decode($json, true); // decode as associative array

  // Loop through rows
  foreach ($List as $row) {
      echo '<tr>';
      echo '<td>'.htmlspecialchars($row['Uppgift']).'</td>';
      echo '<td>'.htmlspecialchars($row['Poäng']).'p</td>';
      echo '<td>'.htmlspecialchars($row['lag']).'</td>';
      echo '</tr>';
  }
  ?>
</table>
