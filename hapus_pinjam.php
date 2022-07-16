<?php 
	include("config.php");
	$idnya = $_GET['id'];
	$sql = "DELETE FROM t_pinjam WHERE id_t_pinjam = $idnya ";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	header("location:peminjaman.php");

?>