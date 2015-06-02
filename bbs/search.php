<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>サンプル | 検索結果</title>
    <meta name="keywords" content="アート,デザイン,ギャラリー,貸しギャラリー,レンタルスペース,画廊,グループ展,美術,芸術,展示,展示会,カフェ,東京,原宿,裏原宿"/>
    <meta name="description" content="デザインフェスタギャラリー原宿・表参道 レンタルスペース 貸しギャラリー カフェ 入場無料・年中無休。原宿駅徒歩5分・表参道駅徒歩9分。"/>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="user-scalable=no" />
    </head>
<body>

<?php
	$id=$_POST['id'];
	$dsn='mysql:dbname=bbs; host=localhost; charset=utf8;';
	$user= 'root';
	$password= 'root';
	$dbh= new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES UTF-8');
	
	$sql= 'SELECT*FROM threads WHERE id=?';//formテーブルのデータを全部くれの意味のSQL文
	$stmt= $dbh->prepare($sql);
	$data[]=$id; 
	$stmt->execute($data);
	
	while(1){
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);//1レコードを取り出し
		if($rec==false){
			break;
		}
		echo $rec['id'];
		echo $rec['created_at'];
		echo $rec['nickname'],'<br>';
		echo $rec['title'],'<br>';
		echo $rec['body'],'<br><br>';
	}
	
	$dbh= null;//切断
?>


<a href="menu.html">メニューに戻る</a>
<br>

</body>
</html>
