<?php

require_once('station.php');

$station = new Station();
//取得したデータを表示
$stationData = $station->getAll();
function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>駅一覧</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="ajax.js"></script>
</head>
<body>
	<h2>駅詳細</h2>
	<h3>駅コード：<span name="Result" id="Result"></span></h3>
	<h3>駅名：<span id="span2"></span></h3>
	<hr>
	<h3>駅情報</h3>
	<p>カテゴリ：<span id="span4"></span></p>
	<p>場所：<span id="span5"></span></p>

	<form id="form1" action="detail.php" method="get">
		<h3>駅名</h3>
		<select name="id" id="id">
				<?php foreach($stationData as $column): ?>
					<option value="<?php echo h($column['id']); ?>">
						<?php echo h($column['stname']); ?>
					</option>
				<?php endforeach; ?>
		</select>
		<input type="button" id="button1" value="決定">
	</form>
	<a href="index.php">管理画面</a>
</body>
</html>
