<?php
require'function.php';
$idp= $_GET['idp'];

if(isset($_GET['idp'])){
    $idp = $_GET['idp'];
} else{
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stock Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed"> 
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Aplikasi Kasir</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pesanan
                            </a>
                            
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang 
                            </a>
                            
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>

                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pelanggan
                            </a>
                            
                            <a class="nav-link" href="logout.php">
                                 Logout
                         
                            </a>
                            
                    
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pesanan:  <?=$idp;?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                      
                     <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                        tambah Barang
                    </button>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data pesanan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr> 
                                        <th> no </th> 
                                         <th> id pesanan </th> 
                                         <th> tanggal</th>  
                                         <th> nama pelanggan</th> 
                                         <th> Jumlah Barang</th> 
                                         <th> aksi </th>
                                        
                                        </tr>


                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $_GET =mysqli_query($c,"select * from pesanan p, pelanggan pl where p.Id_pelanggan=pl.
                                        Id_pelanggan");
                                        

                                        while($produk = mysqli_fetch_array($_GET)){
                                            $id_pesanan = $produk ['Id_Pesanan'];
                                            $tanggal = $produk ['tanggal'];
                                           $nama_pelanggan = $produk ['nama_pelanggan'];
                                           $alamat = $produk ['alamat'];
                                            
                                $i=1;
                                        ?>
                                        
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$id_pesanan;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$nama_pelanggan;?> -<?=$alamat;?></td>
                                            <td>Jumlah Barang</td>
                                            <td> <a href="view.php?idp=<?=$id_pesanan;?>" class="btn btn-primary" target="blank">
                                            tampilkan</a>
                                        </tr>
                                        <?php
                                    };
                                       //end of while

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; WAJIHAN AZZAHRA</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">tambah barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

        <form method ="post">
        <!-- Modal body -->
        <div class="modal-body">
            pilih Barang

          <select name="id_produk" class=form-control>

         <?php
         $getproduk =mysqli_query($c,"select * from produk");

         while($pl=mysqli_fetch_array($getproduk)){
            $Nama_produk=$pl['nama_produk'];
            $stock=$pl['stock'];
            $deskripsi=$pl['deskripsi'];
            $id_produk=$pl['id_produk'];



       

         ?>
         <option value="<?=$id_pelanggan;?>"><?=$Nama_produk;?> - <?=$deskripsi;?></option>
              <?php
  }
               ?>

          </select>

<input type="number" name="jumlah_barang" class="form-control mt4">
<input type="hidden" name="idp" value="<?$idp;?>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name = "addproduk">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</html>
