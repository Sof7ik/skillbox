<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Мои заказы</title>
</head>
<body>

<?php
  require_once 'connection.php'; // подключаем скрипт
  $link = mysqli_connect($host, $user, $password, $db_name)
    or die('Error connecting to MySQL server.');

  $name = $_GET['name'];

  $query = "DELETE FROM callbacks WHERE name = '$name'";
  mysqli_query($link, $query)
    or die('Error querying database.');

  echo 'Заказ удален: ' . $name;;

  mysqli_close($db);
?>

</body>
</html>