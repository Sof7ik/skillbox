<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="30;URL=index.php">
	<link rel="shortcut icon" href="iconfinder_Apply_132742.png" type="image/png">
	<title>Подтверждение заказа</title>

	<style>

		html, body {
			padding: 0px;
			margin: 0px;
			height: 100%;
			font-family: "Arial";
		}

		.success {
			margin: 5% 5%;
			color: black;
			font-weight: bold;
			font-size: 30px;
		}

		.error {
			margin: 5% 5%;
			color: red;
			font-weight: bold;
			font-size: 30px;
		}

		.redirect { /*стили для кнопки "на главную"*/ 
			display: block;
			width: 30%;
			text-align: center;
			text-decoration: none;
			border: 1px solid #FF823A;
			color: white;
			font-size: 22px;
			padding: 30px;
			transition: all 0.5s;
			background-color: #FF823A;
			margin: 0 auto;
		}

		.redirect:hover{ /*стили для ховера кнопки "на главную"*/ 
			border: 1px solid pink;
			padding: 50px;
			font-size: 30px;
			cursor: pointer;
			background-color: #FF5D00;
			color: white;
		}

	</style>

</head>
<body>
	<?php
		
		require_once 'connection.php';
		
		if(isset($_POST['name']) && ($_POST['telefon'])){ 
	    // подключаемся к серверу
	    $link = mysqli_connect($host, $user, $password, $db_name) 
	    or die("Ошибка 1" . mysqli_error($link));

	    // экранирование символов для mysql
	    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name'])); 

	    // экранирование символов для mysql
	    $telefon = htmlentities(mysqli_real_escape_string($link, $_POST['telefon']));   
	    
	    // создание строки запроса
		$query ="INSERT INTO callbacks VALUES(NULL, '$name', NOW(), '$telefon')";
		
		// выполняем запрос
	    $result = mysqli_query($link, $query) or die("Ошибка 2" . mysqli_error($link));

	    if ($result) {
	    	echo "<p class='success'>Ваш заказ принят! Скоро с Вами свяжутся! Через 30 секунд вы будете перемещны на главную страницу!<p>";
	    }
	    else {
	    	echo "<p class='error'>Произошла ошибка " . mysqli_error () . "</p>";
	    }

	    // закрываем подключение
	    mysqli_close($link);

		}
	?>

	<a href="index.php" class="redirect">Вернуться на главную</a>
</body>
</html>