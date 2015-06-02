<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>サンプル | 送信フォーム</title>
    <meta name="keywords" content="アート,デザイン,ギャラリー,貸しギャラリー,レンタルスペース,画廊,グループ展,美術,芸術,展示,展示会,カフェ,東京,原宿,裏原宿"/>
    <meta name="description" content="デザインフェスタギャラリー原宿・表参道 レンタルスペース 貸しギャラリー カフェ 入場無料・年中無休。原宿駅徒歩5分・表参道駅徒歩9分。"/>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="user-scalable=no" />
    </head>
<body>

<form method="post" action="check.php">
	ペンネームを入力<br>
	<input name="nickname" type="text" style="width:100px"><br>
	タイトル<br>
	<input name="title" type="text" style="width:100px"><br>
	本文<br>
	<textarea name="body" type="" style="width:300px"></textarea><br>
	<br>
	<input type="submit" value="送信">
</form>


<?php 
	$dsn='mysql:dbname=bbs; host=localhost; charset=utf8;';
	$user= 'root';
	$password= 'root';
	$dbh= new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES UTF-8');
	
	$sql= 'SELECT*FROM threads WHERE 1';//formテーブルのデータを全部くれの意味のSQL文
	$stmt= $dbh->prepare($sql);
	$stmt->execute();
	

	$dbh = null;
?>

<?php while($thread = $stmt->fetch(PDO::FETCH_ASSOC)):?>
	<section>
	<?php echo $thread['id'];?> <?php echo $thread['nickname'];?>
	<h1>
		<a href="thread.php?id=<?php echo $thread['id'];?>">
			<?php echo $thread['title'];?>
		</a>
	</h1>
	
	</section>
<?php endwhile;?>



</body>
</html>


