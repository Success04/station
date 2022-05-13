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
</head>
<body>
	<h2>駅一覧</h2>
	<p><a href="form.html">新規作成</a></p>
	<table>
		<tr>
			<th>駅コード</th>
			<th>駅名</th>
		</tr>
		<?php foreach($stationData as $column): ?>
		<tr>
			<td><?php echo h($column['code']); ?></td>
			<td><?php echo h($column['stname']); ?></td>
			<td><a href="detail.php?id=<?php echo $column['id']?>">詳細</a></td>
			<td><a href="update_form.php?id=<?php echo $column['id']?>">編集</a></td>
			<td><a href="station_delete.php?id=<?php echo $column['id']?>">削除</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<a href="main.php">一般画面</a>
</body>
</html>
