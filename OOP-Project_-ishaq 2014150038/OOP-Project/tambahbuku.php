<!DOCTYPE HTML>
<html>
    <head>
        <title>Tambah Buku</title>
        <script src="files/js/jquery.min.js"></script>
        <script src="files/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="files/bootstrap/css/bootstrap.min.css">
    </head>
    <body onload="muatDaftarData();">
        
        <div class="col-md-8 col-md-offset-2" ng-controller="listContactCtrl">
            <div class="page-header">
                <h1>
                    Peminjaman Buku
                </h1>
                <ul class="nav nav-pills">
                  <li><a id="nav-list-data" href="index.php" onclick="gantiMenu('list-data');">Daftar Data</a></li>
                  <li><a id="nav-tambah-data" href="tambahbuku.php" onclick="gantiMenu('tambah-data');">Tambah Data</a></li>
                </ul>

            </div>
            <div id="tambah-data" class="well" style="">
                <div class="container">
<h2>Tambah Buku Baru</h2>
<form action="tambahbuku.php" method="POST" class="form-group row">
Kode Buku: <input type="text" name="kode" class="form-control"><br>
Judul Buku: <input type="text" name="judul" class="form-control"><br>
Pengarang Buku: <input type="text" name="pengarang"
class="form-control"><br>
Penerbit Buku: <input type="text" name="penerbit"
class="form-control"><br>
<input type="submit" name="addBook" value="Add Book" class="btn
btn-success"><input type="reset" value="Reset" class="btn btn-warning">
</form>
</div>
            </div>
        </div>
    </body>
</html>
<?php require('Library.php'); if(isset($_POST['addBook'])){ $kode = $_POST['kode']; $judul = $_POST['judul']; $pengarang = $_POST['pengarang']; $penerbit = $_POST['penerbit'];
$Lib = new Library(); $add = $Lib->addBook($kode, $judul, $pengarang, $penerbit); if($add == "Success"){ header('Location: index.php');
} }
?>
