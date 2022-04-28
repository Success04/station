<?php

require_once('station.php');

$station = new Station();
$result = $station->getById($_GET['id']);

$id = $result['id'];
$code = $result['code'];
$stname = $result['stname'];
$category = (int)$result['category'];
$place = (int)$result['place'];
$door = (int)$result['door'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>stationForm</title>
</head>
<body>
	<h2>駅情報更新フォーム</h2>
	<form action="station_update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<p>駅コード：</p>
		<input type="text" name="code" value="<?php echo $code; ?>">
		<p>駅名：</p>
		<input type="text" name="stname" value="<?php echo $stname; ?>">
		<p>駅情報</p>
		<p>カテゴリ：</p>
		<select name="category">
			<option value="1" <?php if($category === 1) echo 'selected'; ?>>各駅停車駅</option>
			<option value="2" <?php if($category === 2) echo 'selected'; ?>>急行停車駅</option>
			<option value="3" <?php if($category === 3) echo 'selected'; ?>>快急停車駅</option>
			<option value="4" <?php if($category === 4) echo 'selected'; ?>>特急停車駅</option>
		</select>
		<br>
		<p>場所：</p>
		<select name="place">
			<option value="1" <?php if($place === 1) echo 'selected'; ?> >1号車</option>
			<option value="2" <?php if($place === 2) echo 'selected'; ?>>2号車</option>
			<option value="3" <?php if($place === 3) echo 'selected'; ?>>3号車</option>
			<option value="4" <?php if($place === 4) echo 'selected'; ?> >4号車</option>
			<option value="5" <?php if($place === 5) echo 'selected'; ?>>5号車</option>
			<option value="6" <?php if($place === 6) echo 'selected'; ?>>6号車</option>
			<option value="7" <?php if($place === 7) echo 'selected'; ?>>7号車</option>
			<option value="8" <?php if($place === 8) echo 'selected'; ?>>8号車</option>
			<option value="9" <?php if($place === 9) echo 'selected'; ?>>9号車</option>
			<option value="10"<?php if($place === 10) echo 'selected'; ?> >10号車</option>
		</select>
		<select name="door">
			<option value="1" <?php if($door === 1) echo 'selected'; ?>>1番ドア</option>
			<option value="2" <?php if($door === 1) echo 'selected'; ?>>2番ドア</option>
			<option value="3" <?php if($door === 1) echo 'selected'; ?>>3番ドア</option>
			<option value="4" <?php if($door === 1) echo 'selected'; ?>>4番ドア</option>
		</select>
		<br>
		<input type="submit" value="送信">
	</form>
	<p><a href="/">戻る</a></p>
</body>
</html>

