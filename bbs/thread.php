<?php 
	$dsn='mysql:dbname=bbs; host=localhost; charset=utf8;';
	$user= 'root';
	$password= 'root';
	$dbh= new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES UTF-8');
	
	//スレッドIDを取得
	$id = $_GET['id'];

	$sql= 'SELECT*FROM threads WHERE id = ' . $id;//formテーブルのデータを全部くれの意味のSQL文
	$stmt= $dbh->prepare($sql);
	$stmt->execute();
	
	$thread = $stmt->fetch(PDO::FETCH_ASSOC);
	$dbh = null;

?>



<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $thread['title'];?></title>
</head>
<body>
<?php echo $thread['id'];?>
<p>作成日時:<?php echo $thread['created_at'];?></p>
<p>タイトル:<?php echo $thread['title'];?></p>
<p><?php echo $thread['body'];?></p>


<section id="resform">
	<h1>コメントを追加</h1>
	<form method="post" action="thanks_res.php">
	<input type="hidden" name="thread_id" type="text" value="<?php echo $thread['id'];?>"><br>
	ペンネームを入力<br>
	<input name="name" type="text" style="width:100px"><br>
	本文<br>
	<textarea name="body" type="" style="width:300px"></textarea><br>
	<br>
	<input type="submit" value="送信">
	</form>
</section>

<section>
	
</section>

<hr>

コメント一覧

<?php
	$dsn='mysql:dbname=bbs; host=localhost; charset=utf8;';
	$user= 'root';
	$password= 'root';
	$dbh= new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES UTF-8');


	$sql_res = "SELECT * FROM responses where thread_id = " . $id . " order by created_at desc";//formテーブルのデータを全部くれの意味のSQL文
	$stmt= $dbh->prepare($sql_res);
	$stmt->execute();

	$dbh = null;
?>

<?php while($responses = $stmt->fetch(PDO::FETCH_ASSOC)):?>
<p><?php echo $responses['name'];?></p>
<p><?php echo $responses['body'];?></p>
<?php endwhile;?>

</body>
</html>