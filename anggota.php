<?php
include("koneksi/koneksi.php");

if(isset($_POST['submit'])) {
	  $nama = $_POST['nama'];
	  $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
	  $agama = $_POST['agama'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    //update anggota
    $query = "INSERT INTO `t_anggota`( `nama`, `jenis_kelamin`,`kelas`,`agama`, `ttl`, `alamat`, `no_telp`) 
        VALUES ('$nama','$jenis_kelamin','$kelas','$agama','$ttl','$alamat','$no_telp')";

    if ($db->query($query)) {
        $db->close();
        header('location:anggota.php');
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
                <img alt="image" src="gambar/avatar.png" class="rounded-circle mr-1">
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
              <li class="nav-item active">
                <a href="anggota.php" class="nav-link "><i class="fas fa-users"></i> <span>Data Anggota</span></a>
              </li>
              
              <li class="menu-header">Master Buku</li>
              <li class="nav-item ">
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
                Data Anggota        
            </h1>
        </div>
        </section>

        <!-- Main content -->
        <div class="card-body">
        <div class="btn-group"><a href="tambah_anggota.php" class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Anggota"><i class="fa fa-plus"></i>Tambah Anggota</a></div>
        <div class="form-group"></div>
        <section class="content">
        <!--modal dialog untuk hapus -->
        <div class="row">
        <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Tempat & Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Kelas</th>
                    <th>No. Telpon</th>
                    <th>Alamat</th>
                    <th colspan="1">Action</th>
                </tr>
            <?php
			$hal=1;
	
			if (!isset($_GET['hal'])) {
				$page=1;
			}else{
				$page= $_GET['hal'];
			}
			
			$max_results = 10;
			$from = (($page * $max_results) - $max_results);
			
			$sql = "SELECT * FROM t_anggota";
			$result = mysqli_query($db,$sql);
			$jum_data = mysqli_num_rows($result);
			
			$no = 1;
			while($tampil = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $tampil['nama']; ?></td>
						<td><?php echo $tampil['ttl']; ?></td>
						<td><?php echo $tampil['jenis_kelamin']; ?></td>
            <td><?php echo $tampil['agama']; ?></td>
            <td><?php echo $tampil['kelas']; ?></td>
						<td><?php echo $tampil['no_telp']; ?></td>
						<td><?php echo $tampil['alamat']; ?></td>
            <td><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_anggota.php?id='+<?= $tampil['id_t_anggota'] ?>  }" class="btn btn-danger text-white">Hapus</a></td>
						</td>
					</tr>
					
				<?php
				$no++;
			}
				?>
		  </table>
		  <br>
		  <?php
				$total_sql = "SELECT COUNT(*) AS NUM FROM t_anggota";
				$total_results = mysqli_query($db,$total_sql);
				$row = mysqli_fetch_array($total_results,MYSQLI_ASSOC);
				$jum = $row['NUM'];
				$total_pages= ceil($jum / $max_results);
				//echo $jum;
				
				//jumlah data setelah filter
				if($jum_data == 0){
					echo "Data tidak ditemukan";
				}
				
				echo "<center> Halaman <br>";
				
				if ($hal > 1){
					$prev= ($page - 1);
					}
					
				for($i=1; $i<=$total_pages; $i++){
						if (($hal)== $i){
							echo "<a href=$_SERVER[PHP_SELF]?hal=$i> $i</a>";
							}else{
							echo "<a href=$_SERVER[PHP_SELF]?hal=$i> $i</a>";
							}
						}
						
				if($hal < $total_pages){
					$next=($page + 1);
					}
				
				echo "</center>";
				?>
		  </div>
	</div>
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
  <script src="js/scripts.js"></script><div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-1">       <div class="modal-dialog modal-md" role="document">         <div class="modal-content">           <div class="modal-header">             <h5 class="modal-title">Are You Sure?</h5>             <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">×</span>             </button>           </div>           <div class="modal-body">           This action can not be undone. Do you want to continue?</div>           <div class="modal-footer">           <button type="button" class="btn btn-danger btn-shadow" id="">Yes</button><button type="button" class="btn btn-secondary" id="">Cancel</button></div>         </div>       </div>    </div><div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-2">       <div class="modal-dialog modal-md" role="document">         <div class="modal-content">           <div class="modal-header">             <h5 class="modal-title">Are You Sure?</h5>             <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">×</span>             </button>           </div>           <div class="modal-body">           This action can not be undone. Do you want to continue?</div>           <div class="modal-footer">           <button type="button" class="btn btn-danger btn-shadow" id="">Yes</button><button type="button" class="btn btn-secondary" id="">Cancel</button></div>         </div>       </div>    </div><div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-3">       <div class="modal-dialog modal-md" role="document">         <div class="modal-content">           <div class="modal-header">             <h5 class="modal-title">Are You Sure?</h5>             <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">×</span>             </button>           </div>           <div class="modal-body">           This action can not be undone. Do you want to continue?</div>           <div class="modal-footer">           <button type="button" class="btn btn-danger btn-shadow" id="">Yes</button><button type="button" class="btn btn-secondary" id="">Cancel</button></div>         </div>       </div>    </div><div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-4">       <div class="modal-dialog modal-md" role="document">         <div class="modal-content">           <div class="modal-header">             <h5 class="modal-title">Are You Sure?</h5>             <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">×</span>             </button>           </div>           <div class="modal-body">           This action can not be undone. Do you want to continue?</div>           <div class="modal-footer">           <button type="button" class="btn btn-danger btn-shadow" id="">Yes</button><button type="button" class="btn btn-secondary" id="">Cancel</button></div>         </div>       </div>    </div><div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-5">       <div class="modal-dialog modal-md" role="document">         <div class="modal-content">           <div class="modal-header">             <h5 class="modal-title">Are You Sure?</h5>             <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">×</span>             </button>           </div>           <div class="modal-body">           This action can not be undone. Do you want to continue?</div>           <div class="modal-footer">           <button type="button" class="btn btn-danger btn-shadow" id="">Yes</button><button type="button" class="btn btn-secondary" id="">Cancel</button></div>         </div>       </div>    </div><div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-6">       <div class="modal-dialog modal-md" role="document">         <div class="modal-content">           <div class="modal-header">             <h5 class="modal-title">Are You Sure?</h5>             <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">×</span>             </button>           </div>           <div class="modal-body">           This action can not be undone. Do you want to continue?</div>           <div class="modal-footer">           <button type="button" class="btn btn-danger btn-shadow" id="">Yes</button><button type="button" class="btn btn-secondary" id="">Cancel</button></div>         </div>       </div>    </div>
  <script src="js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index-0.js"></script>
  