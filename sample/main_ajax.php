<?php
if(isset($_GET['station_name'])) {
	$stname = htmlspecialchars($_GET['station_name'], ENT_QUOTES, "UTF-8");
	echo $stname;
} else {
	echo '駅名を選択してください。';
}
?>
