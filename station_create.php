<?php
require_once('station.php');
$stations = $_POST;

$station = new Station();
$station->stationValidate($stations);
$station->stationCreate($stations);

?>
<p><a href="/">戻る</a></p>

