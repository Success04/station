<?php

require_once('station.php');

$station = new Station();
$result = $station->getById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>駅詳細</title>
</head>
<body>
	<h2>駅詳細</h2>
	<h3>駅コード：<?php echo $result['code']; ?></h3>
	<h3>駅名：<?php echo $result['stname']; ?></h3>
	<hr>
	<h3>駅情報</h3>
	<p>カテゴリ：<?php echo $station->setCategoryName($result['category']); ?></p>
	<p>場所：<?php echo $station->setPlaceName($result['place']); ?><?php echo $station->setDoorName($result['door']); ?></p>
	<p><a href="index.php">トップに戻る</a></p>
</body>
</html>
