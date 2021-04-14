<?php
$name   = $_POST["name"];
$url  = $_POST["url"];
$naiyou = $_POST["naiyou"];
$num    = $_POST["num"];

require_once("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,url,num,naiyou,indate)VALUES(:name,:url,:num,:naiyou,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':num', $num, PDO::PARAM_INT);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect("index.php");
}
