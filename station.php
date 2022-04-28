<?php

require_once('dbc.php');

class Station extends Dbc
{
	protected $table_name = 'station';
	//3カテゴリー名を表示
	//引数：数字
	//返り値：カテゴリーの文字列
	public function setCategoryName($number) {
		if ($number === '1') {
			return '各駅停車駅';
		} else if ($number === '2') {
			return '急行停車駅';
		} else if ($number === '3') {
			return '快急停車駅';
		} else if ($number === '4') {
			return '特急停車駅';
		}else {
			return 'その他';
		}
	}

	public function setPlaceName($number) {
		if ($number === '1') {
			return '1号車';
		} else if ($number === '2') {
			return '2号車';
		} else if ($number === '3') {
			return '3号車';
		} else if ($number === '4') {
			return '4号車';
		} else if ($number === '5') {
			return '5号車';
		} else if ($number === '6') {
			return '6号車';
		}else if ($number === '7') {
			return '7号車';
		}else if ($number === '8') {
			return '8号車';
		}else if ($number === '9') {
			return '9号車';
		}else if ($number === '10') {
			return '10号車';
		} else {
			return 'その他';
		}
	}

	public function setDoorName($number) {
		if ($number === '1') {
			return '1番ドア';
		} else if ($number === '2') {
			return '2番ドア';
		} else if ($number === '3') {
			return '3番ドア';
		} else if ($number === '4') {
			return '4番ドア';
		}else {
			return 'その他';
		}
	}

	public function stationCreate($stations) {
		$sql = "INSERT INTO
					$this->table_name (code, stname, category, place, door)
				VALUES
					(:code, :stname, :category, :place, :door)";

		$dbh = $this->dbConnect();
		$dbh->beginTransaction();

		try {
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(':code', $stations['code'], PDO::PARAM_STR);
			$stmt->bindValue(':stname', $stations['stname'], PDO::PARAM_STR);
			$stmt->bindValue(':category', $stations['category'], PDO::PARAM_INT);
			$stmt->bindValue(':place', $stations['place'], PDO::PARAM_INT);
			$stmt->bindValue(':door', $stations['door'], PDO::PARAM_INT);
			$stmt->execute();
			$dbh->commit();
			echo '駅情報を追加しました';
		} catch (PDOException $e) {
			$dbh->rollback();
			exit($e);
		}
	}

	public function stationUpdate($stations) {
		$sql = "UPDATE
					$this->table_name
				SET
					code = :code, stname = :stname, category = :category, place = :place, door = :door
				WHERE
					id = :id";

		$dbh = $this->dbConnect();
		$dbh->beginTransaction();

		try {
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(':code', $stations['code'], PDO::PARAM_STR);
			$stmt->bindValue(':name', $stations['stname'], PDO::PARAM_STR);
			$stmt->bindValue(':category', $stations['category'], PDO::PARAM_INT);
			$stmt->bindValue(':place', $stations['place'], PDO::PARAM_INT);
			$stmt->bindValue(':door', $stations['door'], PDO::PARAM_INT);
			// $stmt->bindValue(':id', $stations['id'], PDO::PARAM_INT);
			$stmt->execute();
			$dbh->commit();
			echo '駅情報を更新しました';
		} catch (PDOException $e) {
			$dbh->rollback();
			exit($e);
		}
	}

	public function stationValidate($stations) {
		if(empty($stations['code'])) {
			exit('駅コードを入力してください');
		}

		if(empty($stations['stname'])) {
			exit('駅名を入力してください');
		}

		if(mb_strlen($stations['stname']) > 191) {
			exit('191文字以下にしてください');
		}

		if(empty($stations['place'])) {
			exit('駅情報が不足しています');
		}

		if(empty($stations['door'])) {
			exit('駅情報が不足しています');
		}

		if(empty($stations['category'])) {
			exit('カテゴリーは必須です');
		}

		// if(empty($stations['publish_status'])) {
		// 	exit('公開ステータスは必須です');
		// }
	}
}

?>
