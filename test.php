<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>サンプル | 送信確認画面</title>
    <meta name="keywords" content="アート,デザイン,ギャラリー,貸しギャラリー,レンタルスペース,画廊,グループ展,美術,芸術,展示,展示会,カフェ,東京,原宿,裏原宿"/>
    <meta name="description" content="デザインフェスタギャラリー原宿・表参道 レンタルスペース 貸しギャラリー カフェ 入場無料・年中無休。原宿駅徒歩5分・表参道駅徒歩9分。"/>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="user-scalable=no" />
    </head>
<body>
	<?php
		$nickname=$_POST["nickname"];//変数$nickname、$_POST["nickname"]は<input name="nickname">項目を挿入
		$title=$_POST["title"];
		$body=$_POST["body"];
		
		$nickname=htmlspecialchars($nickname);
		$title=htmlspecialchars($title);
		$body=htmlspecialchars($body);
		
		if($nickname==""){
			echo "ペンネームが記入されていません。<br>";
		}
		else{
		echo "ペンネーム：";
		echo $nickname;
		echo "さん";
		echo "<br>";
		}
		
		if($title==""){
			echo "入力されていません。<br>";
		}else{
			echo "タイトル：";
			echo $title;
			echo "<br>";
		}
		
		if($body==""){
			echo "入力されていません。<br>";
		}else{
			echo "本文：";
			echo $body;
			echo "<br>";
		}
		
		if($nickname==""||$title==""||$body==""){
		echo '<form>';
		echo '<input type="button" onclick="history.back()" value="戻る">';//onclick="history.back()"戻ってもデータ有
		//echo '<input type="submit" value="これで送信する">';
		echo '</form>';
		}else{
		echo '<form method="post" action="thanks.php">';
		echo '<input name="nickname" type="hidden" value="'.$nickname.'">';
		echo '<input name="title" type="hidden" value="'.$title.'">';
		echo '<input name="body" type="hidden" value="'.$body.'">';
		echo '<input type="button" onclick="history.back()" value="戻る">';//onclick="history.back()"戻ってもデータ有
		echo '<input type="submit" value="これで送信する">';
		echo '</form>';
		}
	?>
</body>
</html>
