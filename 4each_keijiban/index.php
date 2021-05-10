<!doctype HTML>
<html long="ja">

<head>
    <meta charset="utf-8">
    <title>4eachblog</title>        
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
    <?php
    
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    $stmt = $pdo->query("select * from 4each_keijiban");
    
    ?>
    
    <header>
       
        <img src="4eachblog_logo.jpg">
    
        <ul class="box1">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    
    </header>
    
    <main>
        
        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1>
         <form  method="post" action="insert.php">
             <div>
                <h2 class="nyuryoku">入力フォーム</h2>
                <label>ハンドルネーム</label>
                <br>
                <input type="text" class="text" name="handlename" size="35">
             </div>
             
             <div>
                 <label>タイトル</label>
                 <br>
                 <input type="text" class="text" size="35" name="title">
             </div>
                
             <div>
                 <label>コメント</label>
                 <br>
                 <textarea cols="35" rows="7" name="comments"></textarea>
             </div>
             
             <div>
                <input type="submit" class="submit" value="送信する">
             </div>
         </form>
        </div>    
            
        <div class="right">
            <h2>人気の記事</h2>
            <p>PHPオススメ本</p>
            <p>PHP MyAdminの使い方</p>
            <p>今人気のエディタ top5</p>
            <p>HTMLの基礎</p>
            <h2>オススメリンク</h2>
            <p>インターノウス株式会社</p>
            <p>XAMPPのダウンロード</p>
            <p>Eclipseのダウンロード</p>
            <p>Bracketsのダウンロード</p>
            <h2>カテゴリ</h2>
            <p>HTML</p>
            <p>PHP</p>
            <p>MySQL</p>
            <p>JavaScript</p>
        </div>
        
        <?php
        
        while($row = $stmt->fetch()){
        
        echo"<div class='kiji'>";
            echo"<h2>".$row['title']."</h2>";
            echo"<div class='comments'>";
                echo $row['comments'];
                echo"<div class='handlename'>posted by".$row['handlename']."</div>";
            echo"</div>";
        echo"</div>";
        }
        
        ?>
    
    </main>
    
    <footer>
      copyright©internous|4each blog the which provides A to Z about programing
    </footer>
    
</body>       
</html>