<?php
ini_set('display_errors', 0);
require_once 'koneksi/koneksi.php';
$id_bk = mysqli_real_escape_string($db,$_GET['id']);

if ($id_bk != null){
	$judul = "Edit Buku";
	$sql_data = "SELECT * FROM t_buku WHERE id_t_buku = $id_bk ";
	//echo $sql_data;
	$result_data = mysqli_query($db,$sql_data);
	$tampil_data = mysqli_fetch_array($result_data,MYSQLI_ASSOC);
}else{
	$judul = "Input Buku";
}
	
if(isset($_POST['btnsubmit'])) {
	$nama = $_POST['nama'];
	$penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
	$tahun = $_POST['tahun'];
	
	
	if ($id_bk == null){
		//mulai proses upload cover
		$target_dir = "gambar/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$error = "File bukan file gambar.";
				$uploadOk = 0;
			}
			
		// Check if file already exists
		if (file_exists($target_file)) {
			$error = "File sudah ada.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			$error = "File terlalu besar, harus dibawah 500 kb.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			$error = "File harus ber-ektensi JPG, JPEG atau PNG";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Gagal upload file cover.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$cover = basename( $_FILES["fileToUpload"]["name"]);
			
				//insert buku
				$query = "INSERT INTO t_buku(nama_buku,penulis,penerbit,tahun_terbit,gambar) 
						VALUES('$nama','$penulis', '$penerbit','$tahun','$cover')";
				
				if ($db->query($query)) {
					$db->close();
					header('location:buku.php');
				}
		} else {
			$error = "Terjadi kesalahan saat upload file.";
			}
		}
		//selesai upload cover
	}else{
		//update buku
			$cover = $tampil_data['gambar'];
			$query = "UPDATE t_buku SET nama_buku ='$nama',penulis = '$penulis',penerbit = '$penerbit', tahun_terbit ='$tahun',
					gambar = '$cover'
					WHERE id_t_buku = $id_bk";
	
			if ($db->query($query)) {
				$db->close();
				header('location:buku.php');
			}
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Perpustakaan</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
</head>

<body class="sidebar-gone">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
                <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="gambar/admin.jpg" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Mukhlis Bara Pamungkas</div></a>
            <div class="dropdown-menu dropdown-menu-right">   
            <div class="dropdown-divider"></div>
                <a href="login.php" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
            </li>
            </ul>
        </div>
        </nav>
      <div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">Perpustakaan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="home.php">P</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item ">
                <a href="home.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Controller</li>
              <li class="nav-item ">
                <a href="anggota.php" class="nav-link "><i class="fas fa-users"></i> <span>Data Anggota</span></a>
              </li>
              
              <li class="menu-header">Master Buku</li>
              <li class="nav-item active">
                <a href="buku.php" class="nav-link "><i class="fas fa-th-large"></i> <span>Data Buku</span></a>
              </li>
             
              <li class="menu-header">Transaksi</li>
              <li class="nav-item  ">
                <a href="peminjaman.php" class="nav-link "><i class="fas fa-book"></i> <span>Data Peminjaman</span></a>
              </li> 
            </ul>
        </aside>
      </div>

        <!-- Main Content -->
        <div class="main-content" style="min-height: 553px;">
        <!-- Content Header (Page header) -->
        <section class="section">
            <div class="section-header">
            <h1>
                Data Buku        
            </h1>
        </div>
        </section>

        <!-- Main content -->
        <section class="content">
        
        <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
		<div class="col-lg-6">
			<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label col-sm-4">Nama Buku</label>
					<div class="col-sm-8">
					<input type="text" maxlength="128" class="form-control" name="nama" value="<?php echo $tampil_data['nama_buku'];?>" required  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Penulis</label>
					<div class="col-sm-8">
					<input type="text" maxlength="64" class="form-control" name="penulis" value="<?php echo $tampil_data['penulis'];?>" required  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Tahun Terbit</label>
					<div class="col-sm-8">
					<input type="text" maxlength="4" class="form-control" name="tahun" value="<?php echo $tampil_data['tahun_terbit'];?>" required  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Penerbit</label>
					<div class="col-sm-8">
					<input type="text" maxlength="64" class="form-control" name="penerbit" value="<?php echo $tampil_data['penerbit'];?>" required  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Cover Buku</label>
					<div class="col-sm-8">
					<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
				</div>
				<div class="form-group" align="right">
				<div class="col-sm-4">
				
				</div>
				<div class="col-sm-8">
					<a href="buku.php" class="btn btn-default">Batal</a>
					<button type="submit" name="btnsubmit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>

        <!--css khusus  halaman ini -->
        <link rel="stylesheet" href="http://localhost/perpus1/assets/plugins/datatables/dataTables.bootstrap.css">

                
            
    </div>
</body>
</html> 
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="js/stisla.js"></script>

   <!-- Template JS File -->
  <script src="js/scripts.js"></script>
  <script src="js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index-0.js"></script>

  
   