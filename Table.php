<table>
  <tr>
    <th>Uppgift </th>
    <th>Poäng </th>
    <th>Lag </th>
  </tr>
  <?php
  // Read file contents
  $json = file_get_contents('data.json');
  $List = json_decode($json, true); // decode as associative array

  // Loop through rows
  foreach ($List[1] as $row) {
      $style = $row['avklarad'] ? 'text-decoration: line-through;' : '';
      echo '<tr style="'.$style.'">';
      echo '<td>'.$row['Uppgift'].'</td>';
      echo '<td>'.$row['Poäng'].'p</td>';
      echo '<td>'.$row['lag'].'</td>';
      echo '</tr>';
  }
  ?>
</table>
