<!DOCTYPE html>
<html>
<head>
<title>Поиск</title>
<meta charset="UTF-8">
<style>
table, th, td {border: 1px solid black;border-collapse: collapse;}
</style>
</head>
<body>
<form action="" method="GET">
        <input type="text" name="query" />
		<input type="submit" name="submit" value="Найти" />
</form>
<?php
require 'connect.php';

if(isset($_GET['query'])) {
	$query = $_GET['query'];
	if(strlen($query) >= 3){
        $sql = "SELECT p.title, c.body FROM posts p INNER JOIN comments c ON c.postid = p.id WHERE c.body LIKE ?";
        $stmt = $connect -> prepare($sql);
		$stmt = $connect -> prepare($sql);
		$query = "%" . $query . "%";
		$stmt -> bind_param('s', $query);
		$stmt -> execute();
		$arr = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
		$stmt -> close(); }
	else {
		echo "Минимум 3 символа"; }

if (isset($arr)){
	if (count($arr) > 0){
		echo "<h2>Результаты</h2>";
		echo "<table style=\"width:80%\"><tr><th>Запись</th><th>Комментарий</th></tr>";
		foreach ($arr as $item) {
			echo("<tr><td>{$item['title']}</td><td>{$item['body']}</td></tr>"); }
} 	else {
		echo "Совпадений не найдено";}

echo "</table>";
}
}

?>
</body>
</html>