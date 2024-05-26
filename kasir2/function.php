<?php
session_start();
//bikin koneksi 

$c = mysqli_connect('localhost','root','','Aplikasi_kasir' );

//login
if(isset($_POST['login'])){
    //initiate variable
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($c,"SELECT * FROM user WHERE email='$email' and password='$password' ");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //jika data ditemukan
        //berhasil login

        $_SESSION['login']= 'true';
        header('location:index.php');
    } else{
        //data tidak ditemukan
        //gagal login
        echo '
       <script>alert("email atau password salah");
       window.location.href="login.php"
       </script>
       '; 
    }
}

if (isset($_POST[ "tambahbarang"])){
    $Nama_produk= $_POST ["Nama_produk"];
    $deskripsi= $_POST ["deskripsi"];
     $Harga= $_POST ["harga"];
     $Stock= $_POST ["stock"];

     $insert = mysqli_query($c,"insert into produk (Nama_produk,deskripsi,Harga,Stock)
     values ('$Nama_produk','$deskripsi','$Harga','$Stock')");

     if($insert){
        header('location:stock.php');
     }else{
        echo '
       <script>alert(" gagal memasukan data");
       window.location.href="stock.php"
       </script>
       '; 

     }
}

if (isset($_POST[ "tambahpelanggan"])){
$nama_pelanggan= $_POST ["nama_pelanggan"];
$no_tlp= $_POST ["no_tlp"];
 $alamat= $_POST ["alamat"];


 $insert = mysqli_query($c,"insert into pelanggan2 (nama_pelanggan,no_tlp,alamat)
 values ('$nama_pelanggan','$no_tlp','$alamat')");

 if($insert){
    header('location:pelanggan.php');
 }else{
    echo '
   <script>alert(" gagal memasukan pelanggan");
   window.location.href="pelanggan.php"
   </script>
   '; 


 }

}


if (isset($_POST[ "tambahpesanan"])){
    $id_pelanggan= $_POST ["id_pelanggan"];
 
    
    
     $insert = mysqli_query($c,"insert into pesanan (id_pelanggan)
     values ('$id_pelanggan')");
    
     if($insert){
        header('location:index.php');
     }else{
        echo '
       <script>alert(" gagal memasukan pesanan");
       window.location.href="index.php"
       </script>
       '; 
    
    
     }
    
    }





    

if (isset($_POST[ "addproduk"])){
   $id_pelanggan= $_POST ["id_produk"];
   $idp= $_POST ["idp"];
   $jumlah_barang= $_POST ["jumlah_barang"];
   
   
    $insert = mysqli_query($c,"insert into detail_pesanan (id_pesanan,id_produk,idp,jumlah_barang)
    values ('$id_pelanggan')");
   
    if($insert){
       header('location:index.php');
    }else{
       echo '
      <script>alert(" gagal memasukan pesanan");
      window.location.href="index.php"
      </script>
      '; 
   
   
    }
   
   }
?>