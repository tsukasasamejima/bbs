<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>サンプル | ありがとうございました</title>
    <meta name="keywords" content="アート,デザイン,ギャラリー,貸しギャラリー,レンタルスペース,画廊,グループ展,美術,芸術,展示,展示会,カフェ,東京,原宿,裏原宿"/>
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
		
		$nickname=$_POST["nickname"]; 
		$title=$_POST["title"];
		$body=$_POST["body"];
		$created_at = date('Y-m-d H:i:s');
		
		$nickname=htmlspecialchars($nickname);
		$title=htmlspecialchars($title);
		$body=htmlspecialchars($body);
		
		//echo $email;
		//echo '『'.$email.'』にメールを送りましたので、ご確認くださいませ。';
		
		$mail_sub='自動返信送信ありがとうございます。';
		$mail_body=$nickname."さん\nフォーム送信ありがとうございました。";// \nは改行の意味
		$mail_body=html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
		$mail_head='From:same1130@yahoo.co.jp';
		mb_language('Japanese');
		mb_internal_encoding("UTF-8");
		mb_send_mail($title, $mail_sub, $mail_body, $mail_head);
		
		$sql ='INSERT INTO threads(nickname,title,body,created_at) VALUE("'.$nickname.'","'.$title.'","'.$body.'","'.$created_at.'")';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$id = $dbh->lastInsertId();
		echo $nickname;
		echo ' 様<br>';
		echo 'ありがとうございました。<br>';
		echo '内容『'.$body.'』';
		echo '<a href="thread.php?id='.$id.'">スレッドを見る</a>';
		
		$dbh =null;
		}
		catch (Exception $title)
		{
			echo'ただいまメンテナンス中';
		}
	?>

</body>
</html>