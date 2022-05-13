<?php
    require_once('station.php');
    $station = new Station();
    $result = $station->getById($_POST['id']);
    echo json_encode($result);
    exit;
?>
