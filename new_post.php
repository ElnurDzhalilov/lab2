<?php

$GLOBALS["symb_base"] = "0987654321zxcvbnmasdfghjklqwertyuiopPOIUYTREWQLKJHGFDSAMNBVCXZ";


function gen_str($count) {
	$str = "";
	for ($i = 0; $i < $count; $i++) {
		$num = rand(0,strlen($GLOBALS["symb_base"]) - 1);
		$rand_symb = $GLOBALS["symb_base"][$num];
		$str = $str.$rand_symb;
	}
	return $str;
}


if (isset($_POST["text"])) {
	$text = $_POST["text"];
	$text = trim($text);
	$time = time();

	if (strlen($text) > 900) {
		header("Location: http://localhost/forum.php?message=Слишком длинный текст");
		exit;
	}
	if (strlen($text) < 4) {
		header("Location: http://localhost/forum.php?message=Слишком короткий текст");
		exit;
	}

	
		$sql = "INSERT INTO `posts` (`id`, `text`, `like_count`) VALUES (NULL, '".$text."', '0');";

		$link = mysqli_connect("localhost", "admin", "admin", "lab2_bd");
		mysqli_set_charset($link, "utf8");
		$res = mysqli_query($link, $sql);

		header("Location: http://localhost/forum.php");
	}

?>
