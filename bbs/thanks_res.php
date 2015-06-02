<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>サンプル | ありがとうございました</title>
    <meta name="keywords" content="レスサンクス"/>
    <meta name="description" content="デザインフェスタギャラリー原宿・表参道 レンタルスペース 貸しギャラリー カフェ 入場無料・年中無休。原宿駅徒歩5分・表参道駅徒歩9分。"/>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="user-scalable=no" />
    </head>
<body>
	<?php
		try
		{
		$dsn = 'mysql:dbname=bbs; host=localhost; charset=utf8;';//PHP 5.3.6以降では charset =utf8;で文字化けを防ぐ
		$user = 'root';
		$password ='root';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES UTF-8');
		
		$thread_id=$_POST["thread_id"]; 
		$name=$_POST["name"]; 
		$body=$_POST["body"];
		
		$thread_id=htmlspecialchars($thread_id);
		$name=htmlspecialchars($name);
		$body=htmlspecialchars($body);
		
		echo $name;
		echo ' 様<br>';
		echo 'ありがとうございました。<br>';
		echo '内容『'.$body.'』<br>';
		//echo $email;
		//echo '『'.$email.'』にメールを送りましたので、ご確認くださいませ。';
		
		$sql ='INSERT INTO responses(thread_id,name,body) VALUE("'.$thread_id.'","'.$name.'","'.$body.'")';
		$stmt = $dbh->prepare($sql);
		$data[] = $code;
		$stmt->execute($data);
		
		$dbh =null;
		}
		catch (Exception $body)
		{
			echo'ただいまメンテナンス中';
		}
	?>
</body>
</html>
