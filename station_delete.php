<?php

require_once('station.php');

$station = new Station();
$result = $station->delete($_GET['id']);
?>
<p><a href="index.php">トップに戻る</a></p>
