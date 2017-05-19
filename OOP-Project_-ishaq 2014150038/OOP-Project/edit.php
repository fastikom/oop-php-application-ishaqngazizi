<?php
	require('Library.php');
	if(isset($_GET['kode'])){
		$Lib = new Library();
		$book = $Lib->editBook($_GET['kode']);
		$edit = $book->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Buku</title>
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
				<h2>Ubah Data Buku</h2>
<form action="edit.php" method="POST" class="form-group">
Kode Buku: <input type="text" name="kode" value="<?php echo $edit->kodeBuku; ?>"
class="form-control"><br>
Judul Buku: <input type="text" name="judul" value="<?php echo $edit->judulBuku; ?>"
class="form-control"><br>
Pengarang Buku: <input type="text" name="pengarang" value="<?php echo $edit->pengarang; ?>" 
class="form-control"><br>
Penerbit Buku: <input type="text" name="penerbit" value="<?php echo $edit->penerbit; ?>" 
class="form-control"><br>
<input type="submit" name="updateBook" value="Update" class="btn
btn-info">
</form>
				</div>
            </div>
            <div id="edit-data" class="well" style="display:none;">
                <form id="eform-data">
				
                    <div id="name-group" class="form-group" style="display:none;">
                        <label>id data:</label> 
                        <input type="text" class="form-control" id="eid_data" name="nama" placeholder="" /><br/>
                    </div>
				
                    <div id="name-group" class="form-group">
                        <label>Nama:</label> 
                        <input type="text" class="form-control" id="enama" name="nama" placeholder="contoh: Nyekrip Web" /><br/>
                    </div>
                    <div id="alamat-group" class="form-group">
                        <label>Alamat:</label> 
                        <input type="text" class="form-control" id="ealamat" name="alamat" placeholder="contoh: Indonesia" /><br/>
                    </div>
                    <div id="ket-group" class="form-group">
                        <label>Keterangan:</label> 
                        <textarea class="form-control" id="eket" name="ket" placeholder="contoh: Web Tutorial Indonesia"></textarea><br/>
                    </div>
                    <input type="button" value="Simpan" onclick="simpanEditData();" class="btn btn-success btn-small"/>
                    <input type="reset" value="Reset" onclick="" class="btn btn-warning btn-small"/>
                    <input type="button" value="Cancel" onclick="gantiMenu('list-data');" class="btn btn-warning btn-small"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
}
if(isset($_POST['updateBook'])){ $kode = $_POST['kode']; $judul = $_POST['judul']; $pengarang = $_POST['pengarang']; $penerbit = $_POST['penerbit'];
$Lib = new Library(); $upd = $Lib->updateBook($kode, $judul, $pengarang, $penerbit); if($upd == "Success"){ header('Location: index.php'); } }
?>
