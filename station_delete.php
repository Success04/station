<?php

require_once('station.php');

$station = new Station();
$result = $station->delete($_GET['id']);
?>
<p><a href="/">戻る</a></p>
