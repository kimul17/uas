<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi.php";
if ($_SESSION['username']) {
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
 <script src="js/jquery.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
    <div class="container">
        <a href="index.php" class="navbar-brand"></a>
        <button class="navbar-toggler" type="button" data-togle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-auto pt-2 pb-2">
            <li class="nav-item ml-4">
                <a href="logout.php" class="nav-link text-light"> Log Out </a>
            </li>
        </ul>
    </div>
</nav>
   <div class="col-sm-13">
    <br>
    <h2><center><b>Data Pasien COVID-19</b></center></h2>
    </br>
	<body>
<center>
<h1>
<?php
	$sekarang = getdate(); 
	$bulan = $sekarang['month'];
	$hari = $sekarang ['mday'];
	$tahun = $sekarang ['year'];
	$jam = $sekarang['hours'];
	if ($jam <= 11) {
		echo "Selamat Pagi";
		} elseif ($jam > 11 and $jam <= 12) {
		echo "Selamat Siang";
		} elseif ($jam > 13 and $jam <= 18) {
		echo "Selamat Sore";
		} elseif ($jam > 18) {
		echo "Selamat Malam";
	}
?>
</h1>
	<h4> Saturday <?php echo "$hari $bulan $tahun"; ?></h4>
	<h4>Kelompok-1</h4>
	<h6>181011402436-ADITYA TRI HERDIANSYAH </h6>
	<h6>181011402236- AENUN NISA</h6>
	<h6>171011402192- AHMAD AHSAM ROZAQ</h6>
	<h6>161021450504- AHMAD MULYADI</h6>
	<h6>171011401048- AJI DWIYATNA</h6>
	<h6>171011401151- AKBAR PRIANTO</h6>
	<h6>181011402263- ANDI LISDIARTO</h6>
	<h6>181011402365- ANGGIT PRASTIKA SETIANY</h6>
	<h6>171011401801- ARDIAN RIZKY RAMADHANI</h6>
</body>
<br><br>
            <a href="tambah.php" style="margin-left:0.5pc;" 
              class="btn btn-success btn-md pull-right">
              <i class="fa fa-list"></i>Insert Data</a>
            <div class="clearfix"></div>
            <br/>
    <table class="table table-striped table-hover dtabel">
     <thead>
      <tr>
       <th>No</th>
       <th>Nama Wilayah</th>
       <th>Jumlah Positif</th>
       <th>Jumlah Dirawat</th>
       <th>Jumlah sembuh</th>
       <th>Jumlah Meninggal</th>
       <th>Nama Operator</th>
       <th>Nim Mahasiswa</th>
       <th>Aksi</th>
      </tr>
     </thead>
     <tbody> 
      
      <?php
       $no = 1;  
       $result =  mysqli_query($con,"SELECT * FROM data");
       while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
       <td><?php echo $no++; ?></td>
       <td><?php echo $row['nama_wilayah']; ?></td>
       <td><?php echo $row['jumlah_positif']; ?></td>
       <td><?php echo $row['jumlah_dirawat']; ?></td>
       <td><?php echo $row['jumlah_sembuh']; ?></td>
       <td><?php echo $row['jumlah_meninggal']; ?></td>
       <td><?php echo $row['nama_operator']; ?></td>
       <td><?php echo $row['nim_mahasiswa']; ?></td>
       <td>
        <a href="editform.php?id=<?php echo $row['id'];?>" class="btn btn-success" role="button">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger" role="button">Hapus</a>
        <a href="cetak.php?id=<?php echo $row['id']?>" class="btn btn-primary" role="button">Cetak</a>
       </td>
      </tr>

      <?php
       }
      ?>
     </tbody>
    </table>
   </div>
  </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
 <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
 <script>
 $(document).ready(function() {
  $('.dtabel').DataTable();
 } );
 </script>

</html>
<?php
} else {
    header("location:login.php");
}
?>