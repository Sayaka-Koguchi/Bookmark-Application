<?php
//1.  DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db_class;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage()); //エラーの際の表示
  }

//２．データ取得SQL作成
$sql = "SELECT * FROM gs_bookmark_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //実行：true or false

//３．データ表示
if($status == false){
   //execute（SQL実行時にエラーがある場合）  
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

}

// book_statusをカウント
$Statuses = [];
while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $statuses[$result['book_status']] = $result['count'];
}
// ステータスが存在しない場合の初期化
$statuses = array_merge(['Not Started' => 0, 'In Progress' => 0, 'Completed' => 0], $statuses);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク表示</title>
</head>
<body id="main">
<header>
    <nav>
      <a href="index.php">ブックマーク</a>
    </nav>
  </header>

  <main>
  <div class="container">
    <h1>ブックマーク一覧</h1>
        <div class="bookmark-list">
        <!-- PHP でデータを取得し、以下の形式で表示する -->
        <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
          <p> 
            <?= htmlspecialchars($result['date'], ENT_QUOTES, 'UTF-8') ?> : 
            <?= htmlspecialchars($result['category'], ENT_QUOTES, 'UTF-8') ?> - 
            <?= htmlspecialchars($result['book_name'], ENT_QUOTES, 'UTF-8') ?> -
            <?= htmlspecialchars($result['book_url'], ENT_QUOTES, 'UTF-8') ?> - 
            <?= htmlspecialchars($result['book_comment'], ENT_QUOTES, 'UTF-8') ?> - 
            <?= htmlspecialchars($result['book_status'], ENT_QUOTES, 'UTF-8') ?> 
          </p>
        <?php endwhile; ?> 

        // 読書状況の詳細を表示
        <!-- <p>未着手：　<?= $statuses['Not Started']?></p>
        <p>進行中：　<?= $statuses['In Progress']?></p>
        <p>完了：　<?= $statuses['Completed']?></p> -->

        </div>

    </div>

  </main>