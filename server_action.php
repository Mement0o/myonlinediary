<?php 

/* Logbook */

$newEntry = isset($_POST['entry']) ? $_POST['entry'] : '';

$date = date("Y-m-d H:i:s");
$filenameEntry = './entries/' . $date; 
file_put_contents($filenameEntry, $newEntry);

echo "<div class=\"date\">$date: </div>"; 
echo "<div class=\"text\">$newEntry</div>";
/* echo "<span class=\"date\">Guilhem: </span>";
echo "<span class=\"text\">$newEntry</span>"; */

?>