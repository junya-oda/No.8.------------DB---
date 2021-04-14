<?php
// session_start();

$id = $_GET["id"];
require_once("funcs.php");
// loginCheck();
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>書籍名：<input type="text" name="name" value="<?= $row["name"] ?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $row["url"] ?>"></label><br>
                <label>番号：<input type="text" name="num" value="<?= $row["num"] ?>"></label><br>
                <label><textArea name="naiyou" rows="4" cols="40"><?= $row["naiyou"] ?></textArea></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
</body>

</html>
