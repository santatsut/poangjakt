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
      echo '<td>
<form method="post">
    <button type="submit" name="done" value="'.htmlspecialchars($row['Uppgift']).'">
        Done
    </button>
</form>
          </td>';
      echo '</tr>';
  }

  if (isset($_POST['done'])) {
      $taskId = $_POST['done']; // the Uppgift from the row clicked

      foreach ($List[1] as &$row) {
          if ($row['Uppgift'] === $taskId) {
              $row['avklarad'] = true; // mark only this one
          }
      }

      file_put_contents('data.json', json_encode($List, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

      // reload to show the update and prevent resubmission
      header('Location: '.$_SERVER['PHP_SELF']);
      exit;
  }
  ?>
</table>
