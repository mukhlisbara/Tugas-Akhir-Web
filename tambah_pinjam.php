<?php

include("koneksi/koneksi.php");

if(isset($_POST['submit'])) {
	$id_t_pinjam = $_POST['id_t_pinjam'];
	$nama = $_POST['nama'];
    $judul_buku = $_POST['judul_buku'];
	$kelas = $_POST['kelas'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $keterangan = $_POST['keterangan'];
    $jml_pinjam = $_POST['jml_pinjam'] ;

    //update anggota
    $query = "INSERT INTO `t_pinjam`(`id_t_pinjam`, `nama`, `judul_buku`, `kelas`, `tgl_pinjam`, `tgl_kembali`, `keterangan`,`jml_pinjam`) 
    VALUES (NULL,'$nama','$judul_buku','$kelas','$tgl_pinjam','$tgl_kembali','$keterangan','$jml_pinjam')";

    if ($db->query($query)) {
        $db->close();
        header('location:peminjaman.php');
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
              <li class="nav-item ">
                <a href="buku.php" class="nav-link "><i class="fas fa-th-large"></i> <span>Data Buku</span></a>
              </li>
             
              <li class="menu-header">Transaksi</li>
              <li class="nav-item active ">
                <a href="peminjaman.php" class="nav-link "><i class="fas fa-book"></i> <span>Data Peminjaman</span></a>
              </li> 
            </ul>
        </aside>
      </div>

        <!-- Main Content -->
        <div class="main-content" style="min-height: 553px;">
            <!-- Content Header (Page header) -->
            <section class="section">
            <div class="section-header"><i class="fa fa-plus"></i> <i class="fa fa-book"></i>
            <h1>
                Data Transaksi        
            </h1>
            </div>
            </section>
            <div class="form-group"></div>
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="card-body p-0">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input name="nama" class="js-example-basic-single form-control" placeholder="Nama Lengkap"></input>
                        </div>
                        <br>
                        <label class="col-sm-2 control-label">Judul Buku</label>
                        <div class="col-sm-5">
                            <input name="judul_buku" class="js-example-basic-single form-control" placeholder="Judul Buku"></input>
                        </div>
                        <br>
                        <label class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-5">
                            <select name="kelas" class="js-example-basic-single form-control">
                                <option>X IPA 1</option>
                                <option>X IPA 2</option>
                                <option>X IPA 3</option>
                                <option>X IPS 1</option>
                                <option>X IPS 2</option>
                                <option>X IPS 3</option>
                                <option>XI IPA 1</option>
                                <option>XI IPA 2</option>
                                <option>XI IPA 3</option>
                                <option>XI IPS 1</option>
                                <option>XI IPS 2</option>
                                <option>XI IPS 3</option>
                                <option>XII IPA 1</option>
                                <option>XII IPA 2</option>
                                <option>XII IPA 3</option>
                                <option>XII IPS 1</option>
                                <option>XII IPS 2</option>
                                <option>XII IPS 3</option>
                            </select>
                        </div>
                        <br>
                    </div>
                        <div class="card-body p-0">
                        <label class="col-sm-2 control-label">Tanggal Pinjam</label>
                        <div class="col-sm-5">
                            <input type="date" data-provide="datepicker" class="bootstrap-datepicker" name="tgl_pinjam">
                        </div>
                        <br>
                        <label class="col-sm-2 control-label">Tanggal Kembali</label>
                        <div class="col-sm-5">
                            <input type="date" data-provide="datepicker" class="bootstrap-datepicker" name="tgl_kembali">
                        </div>
                        <br>
                        <label class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input name="keterangan" class="js-example-basic-single form-control" placeholder="Keterangan"></input>
                        </div>
                        <br>
                        <label class="col-sm-2 control-label">Jumlah Pinjam</label>
                        <div class="col-sm-5">
                            <input name="jml_pinjam" class="js-example-basic-single form-control" placeholder="Jumlah Pinjam"></input>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <div class="btn-group">
                            <button type="submit" name="submit" value="simpan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <div class="btn-group ">
                        <td>
                            <a href="peminjaman.php" class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
                        </td>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        
        <!--show error message here -->        
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

  
