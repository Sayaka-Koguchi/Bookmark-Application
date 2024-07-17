<?php
//1.  DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db_class;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage()); //エラーの際の表示
  }


//2. ステータスごとのデータカウントSQL作成
$sql_count = "SELECT book_status, COUNT(*) as count FROM gs_bookmark_table GROUP BY book_status";
$stmt_count = $pdo->prepare($sql_count);
$status_count = $stmt_count->execute(); //実行：true or false

// ステータスごとのデータカウント表示
if($status_count == false){
//execute（SQL実行時にエラーがある場合）
$error = $stmt_count->errorInfo();
exit("ErrorQuery:".$error[2]);
}


// book_statusをカウント
$Statuses = [];
while($result_count = $stmt_count->fetch(PDO::FETCH_ASSOC)) {
  $statuses[$result_count['book_status']] = $result_count['count'];
}
// ステータスが存在しない場合の初期化
$statuses = array_merge(['notStarted' => 0, 'inProgress' => 0, 'completed' => 0], $statuses);


//3．データ取得SQL作成
$sql = "SELECT * FROM gs_bookmark_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //実行：true or false

//4．データ表示
if($status == false){
   //execute（SQL実行時にエラーがある場合）  
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

}

//5. ステータスとカテゴリーの日本語ラベルマッピング
$status_labels = [
  'notStarted' => '未着手',
  'inProgress' => '進行中',
  'completed' => '完了',
];

$category_labels = [
  'literature' => '文学',
  'politics' => '政治',
  'society' => '社会',
  'economy' => '経済',
  'science' => '科学',
  'history' => '歴史',
  'art' => '芸術',
  'Entertainment' => 'エンタメ',
  'others' => 'その他'
];


?>


<!DOCTYPE html>
<html lang="ja">
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

      <!-- 読書状況の詳細を表示 -->
        <p>未着手：　<?= $statuses['notStarted']?></p>
        <p>進行中：　<?= $statuses['inProgress']?></p>
        <p>完了：　<?= $statuses['completed']?></p>

        <!-- PHP でデータを取得し、以下の形式で表示する -->
        <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
          <p> 
            <?= htmlspecialchars($result['date'], ENT_QUOTES, 'UTF-8') ?> : 
            <?= htmlspecialchars($category_labels[$result['category']], ENT_QUOTES, 'UTF-8') ?> - 
            <?= htmlspecialchars($result['book_name'], ENT_QUOTES, 'UTF-8') ?> -
            <?= htmlspecialchars($result['book_url'], ENT_QUOTES, 'UTF-8') ?> - 
            <?= htmlspecialchars($result['book_comment'], ENT_QUOTES, 'UTF-8') ?> - 
            <?= htmlspecialchars($status_labels[$result['book_status']], ENT_QUOTES, 'UTF-8') ?> 
          </p>
          </p>
        <?php endwhile; ?> 

       

        </div>

    </div>

  </main>


    
</body>
</html>