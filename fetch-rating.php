<?php
  $db = new SQLite3('traveldb.sq3');
  $sql = "SELECT * FROM Countries";
  $result = $db->query($sql);
  while ($row = $result->fetchArray(SQLITE3_ASSOC)){
    echo $row['CountryCode'] . ': $' . $row['CountryName'] . '<br/>';
  }
unset($db);
?>
