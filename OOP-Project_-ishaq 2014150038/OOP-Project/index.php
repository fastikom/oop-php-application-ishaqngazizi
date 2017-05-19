<!DOCTYPE HTML>
<html>
    <head>
        <title>Beranda</title>
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
                  <li><a id="nav-tambah-data" href="tambahbuku.php" onclick="gantiMenu('tambah-data');">Tambah Buku</a></li>
                </ul>

            </div>
            <div id="tambah-data" class="well" style="">
                <div class="container">
				<h2>Daftar Buku yang Tersedia</h2>
<table class="table">
<tr>
<td>Kode Buku</td>
<td>Judul Buku</td>
<td>Pengarang Buku</td>
<td>Penerbit Buku</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php
require("Library.php");
$Lib = new Library();
$show = $Lib->showBooks();
while($data = $show->fetch(PDO::FETCH_OBJ)){
echo "
<tr>
<td>$data->kodeBuku</td>
<td>$data->judulBuku</td>
<td>$data->pengarang</td>
<td>$data->penerbit</td>
<td><a class='btn btn-danger'
href='index.php?delete=$data->kodeBuku'>Delete</a></td>
<td><a class='btn btn-info' href='edit.php?kode=$data->kodeBuku'>Edit</td>
</tr>";
};
?>
</table>
				</div>
            </div>

        </div>
    </body>
</html>
<?php if(isset($_GET['delete'])){ $del = $Lib->deleteBook($_GET['delete']);
header('Location: index.php');} ?> 