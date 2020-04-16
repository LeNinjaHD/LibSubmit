<?php
$id = $_GET["id"];
require("mysql.php");
$statement = $pdo->prepare("SELECT href FROM resources WHERE id = ?");
$statement->execute(array($id));
while($row = $statement->fetch()) {
    $href = $row["href"];
}
header('Location: '.$href);