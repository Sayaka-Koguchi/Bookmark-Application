<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク</title>
</head>
<header>
    <nav>
      <a href="select.php">ブックマーク表示</a>
    </nav>
  </header>
<body>
<form method="POST" action="insert.php">
    <fieldset>
        <legend>ブックマーク</legend>
        
        カテゴリー： <select name="category" id="category">
            <option value="literature">文学</option>
            <option value="politics">政治</option>
            <option value="society">社会</option>
            <option value="economy">経済</option>
            <option value="science">科学</option>
            <option value="history">歴史</option>
            <option value="art">芸術</option>
            <option value="Entertainment">エンタメ</option>
            <option value="others">その他</option>
        </select><br>
        <label for="book_name">書籍名: <input type="text" id="book_name" name="book_name"></label><br>
        <label for="book_url"> URL： <input type="text" id="book_url" name="book_url"></label><br>
        <p>コメント： </p>
        <label for="book_comment"> <textarea name="book_comment" rows="3", cols="30"></textArea></label><br>
        読書状況： <select name="book_status" id="book_status">
            <option value="notStarted">未着手</option>
            <option value="inProgress">進行中</option>
            <option value="completed">完了</option>
        </select><br>
        <input type="submit" value="登録">
    </fieldset>

</form>


    
</body>
</html>