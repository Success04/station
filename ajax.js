$(function(){
	$('#button1').click(function(){
		$.ajax({
			url:'ajax.php',
			type:'POST',
			dataType:'json',
			data: {
				id:$('#id').val()
			},
		}).done(function(data){
			function setCategoryName(number) {
				if (number === '1') {
					return '各駅停車駅';
				} else if (number === '2') {
					return '急行停車駅';
				} else if (number === '3') {
					return '快急停車駅';
				} else if (number === '4') {
					return '特急停車駅';
				}else {
					return 'その他';
				}
			}

			function setPlaceName(number) {
				if (number === '1') {
					return '1号車';
				} else if (number === '2') {
					return '2号車';
				} else if (number === '3') {
					return '3号車';
				} else if (number === '4') {
					return '4号車';
				} else if (number === '5') {
					return '5号車';
				} else if (number === '6') {
					return '6号車';
				}else if (number === '7') {
					return '7号車';
				}else if (number === '8') {
					return '8号車';
				}else if (number === '9') {
					return '9号車';
				}else if (number === '10') {
					return '10号車';
				} else {
					return 'その他';
				}
			}

			function setDoorName(number) {
				if (number === '1') {
					return '1番ドア';
				} else if (number === '2') {
					return '2番ドア';
				} else if (number === '3') {
					return '3番ドア';
				} else if (number === '4') {
					return '4番ドア';
				}else {
					return 'その他';
				}
			}

			let category = setCategoryName(data.category);
			let place = setPlaceName(data.place);
			let door = setDoorName(data.door);

			$('#Result').html(data.code);
			$('#span2').html(data.stname);
			$('#span4').html(category);
			$('#span5').html(place + ' ' + door);
			$('#span3').html();
			console.log(data.category);
		}).fail(function(){
			alert('通信に失敗しました。');
		});
	});
});
