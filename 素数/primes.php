<?php 
	function generate_primes($n) {
		$prime = array(2);
		$x = 1; 
		$k = 1;
		while ($k < $n) {
			$x += 2;
			$j = 0;
			while ($j < $k && $x % $prime[$j] != 0){
				$j++;
			}
			if ($j == $k) {
				$prime[] = $x;
				$k++;
			}
		}
		return $prime;
	}

	$output = '';
	if(isset($_POST) && !empty($_POST)){
	    $n = (int)htmlspecialchars($_POST['sosuu']);
	    if ($n > 0 && $n <= 10000) {
			$output = generate_primes($n);
		} else {
			echo '1から10000までの整数を入力してください';
		}
	}

 ?>

<!DOCTYPR HTML PUBLIC "-//W3C//DTD/ HTML 4. Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>素数</title>
</head>

<body>
	<form method="post" action="">
		素数の数を入力してください<br />
		<input name="sosuu" type="text" style="width:100px"><br />
		<input type="submit" value="送信">
	</form>

	<?php if (!empty($output)) {
		for($i=0; $i<count($output); $i++){
			if ($i % 10 == 0) {
				echo '<br />';
			}
			echo $output[$i].' ';
		}
	} ?>


</body>
</html>
