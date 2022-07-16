<?php 
	include("config.php");
	$idnya = $_GET['id'];
	$sql = "DELETE FROM t_buku WHERE id_t_buku = $idnya ";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	header("location:buku.php");

?>