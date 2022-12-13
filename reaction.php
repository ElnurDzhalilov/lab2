<?php
	$id = $_GET["id"];
	$reaction = $_GET["reaction"];
	$page = $_GET["page"];
	$count = $_GET["count"];

	$count  += 1;

	if ($count > 999)
		header("Location: http://localhost/forum.php?page=".$page."&message=Достигнуто максимально число этой реакции");
	else {
		if ($reaction == "like")
			$sql = "UPDATE `posts` SET `like_count` = '".$count."' WHERE `posts`.`id` = ".$id.";";

		$link = mysqli_connect("localhost", "admin", "admin", "lab2_bd");
		$res = mysqli_query($link, $sql);
		header("Location: http://localhost/forum.php?page=".$page);
	}
?>
