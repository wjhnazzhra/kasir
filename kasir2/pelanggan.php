<?php
require'function.php';
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
                            
                         

                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pelanggan
                            </a>
                            
                            <a class="nav-link" href="logout.php">
                                 Logout
                         
                            </a>
                            
                    
                           
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">jumlah pelanggan</div>
                                    
                                </div>
                            </div>
                     <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                        tambah pelanggan
                    </button>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data pelanggan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                    <thead>

                                    <tr> 
                                         <th> No </th> 
                                         <th> Nama Pelanggan</th>  
                                         <th> Nomor telepon </th>
                                         <th> alamat </th>
                                        <th>Aksi</th>
                                        </tr>


                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $_GET =mysqli_query($c,"select * from pelanggan2");
                                        $i = 1; // penomoran

                                        while($produk = mysqli_fetch_array($_GET)){
                                            $nama_pelanggan = $produk ['nama_pelanggan'];
                                            $no_tlp = $produk ['no_tlp'];
                                            $alamat= $produk ['alamat'];
                                          
                                    
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?= $nama_pelanggan;?></td>
                                            <td><?=$no_tlp;?></td>
                                            <td><?= $alamat;?></td>
                                            <td>Edit Delete</td>
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
          <h4 class="modal-title">tambah pelanggan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

        <form method ="post">
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="nama_pelanggan" class="form-control mt-2 " placeholder="Nama pelanggan "> 
          <br>
          <input type="text" name="no_tlp" class="form-control mt-2" placeholder="Nomor Telepon">
          <br>
          <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name = "tambahpelanggan">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</html>
