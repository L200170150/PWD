<?php
    $conn = mysqli_connect('localhost','root','','informatika');
?>
<html>
    <head>
        <title>index</title>
    </head>
    <body>

	<center>
		<?php
			error_reporting(E_ALL ^ E_NOTICE);
			$conn = mysqli_connect("localhost","root","","informatika");
			$kodebl1 = $_POST["kodebl1"];
			$kodeb1 = $_POST["kodeb1"];
			$Namab1 = $_POST["Namab1"];
			$jenis1 = $_POST["jenis1"];
			$Submit1 = $_POST["Submit1"];
			$Ubah1 = $_POST["Ubah1"];
			if ($Submit1) {
				if ($kodeb1 == "") {
					echo "<h3>kode_buku tidak boleh kosong</h3>";
				} elseif ($Namab1 == "") {
					echo "<h3>Nama buku tidak boleh kosong</h3>";
				} elseif ($jenis1 == "") {
					echo "<h3>kode_jenis tidak boleh kosong</h3>";
				} else {
					$insert1 = "INSERT INTO jenis_buku (kode_jenis, nama_jenis, keterangan_jenis) 
								VALUES ('$kodeb1','$Namab1','$jenis1')
							";
					mysqli_query($conn, $insert1);
					echo "<h3>Data Berhasil Dimasukkan</h3>";
				}
			
			} elseif ($Ubah1) {
				if ($kodeb1 == "") {
					echo "<h3>kode tidak boleh kosong</h3>";
				} elseif ($Namab1 == "") {
					echo "<h3>Nama tidak boleh kosong</h3>";
				} elseif ($jenis1 == "") {
					echo "<h3>keterangan tidak boleh kosong</h3>";
				} else {
					$update1 = " UPDATE jenis_buku
								SET kode_jenis='$kodeb1', nama_jenis='$Namab1', keterangan_jenis='$jenis1'
								WHERE kode_jenis = '$kodebl1'
							";
					mysqli_query($conn, $update1);
					echo "<h3>Data Berhasil Diubah</h3>";
				}
			}
			if ($_GET["hps1"]) {
				$kodeb1 = $_GET["hps1"];
				$hapus1 = "DELETE FROM jenis_buku WHERE kode_jenis = '$kodeb1'";
				mysqli_query($conn, $hapus1);
				echo "<h3>Data berhasil di hapus</h3>";
			
			} elseif ($_GET["ubh1"]) {
				$kodeb1 = $_GET["ubh1"]; 
				$cari1 = "SELECT * FROM jenis_buku WHERE kode_jenis='$kodeb1'";
				$hasil1 = mysqli_query($conn, $cari1);
				$data1 = mysqli_fetch_array($hasil1); 
			}
		?>

	
		<form method="post" action="Modul6.php">
			<table>
				<tr>
					<td>kode</td>
					<td>:</td>
					<td> 
						<input type="text" name="kodeb1" value="<?php echo $data1[0] ?>">
						<input type="hidden" name="kodebl1" value="<?php echo $data1[0] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<input type="text" name="Namab1" value="<?php echo $data1[1] ?>">
					</td>
				</tr>
				<tr>
					<td>keterangan</td>
					<td>:</td>
					<td>
						<input type="text" name="jenis1" value="<?php echo $data1[2] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<?php
							if ($data1) {
								echo "<input type='submit' name='Ubah1' value='Ubah'>";
							} else {
								echo "<input type='submit' name='Submit1' value='Submit'>";
							}
						?>
					</td>
				</tr>
			</table>
		</form>

		<hr>

		<table border="1">
			<tr>
				<td>kode</td>
				<td>Nama</td>
				<td>jenis</td>
				<td>Aksi</td>
			</tr>
			<?php
				$cari1 = "SELECT * FROM jenis_buku";
				$hasil1 = mysqli_query($conn, $cari1);
				while ($data1 = mysqli_fetch_row($hasil1)){
					echo "
						<tr>
							<td>$data1[0]</td>
							<td>$data1[1]</td>
							<td>$data1[2]</td>
							<td>
								<a href='Modul6.php?ubh1=$data1[0]'>Ubah</a>
								<a href='Modul6.php?hps1=$data1[0]'>Hapus</a>
							</td>
						</tr>
					";
				}
			?>
		</table>

	</center>


        <center>
		<?php
			error_reporting(E_ALL ^ E_NOTICE);
			$conn = mysqli_connect("localhost","root","","informatika");
			$kodebl = $_POST["kodebl"];
			$kodeb = $_POST["kodeb"];
			$Namab = $_POST["Namab"];
			$jenis = $_POST["jenis"];
			$Submit = $_POST["Submit"];
			$Ubah = $_POST["Ubah"];
			if ($Submit) {
				if ($kodeb == "") {
					echo "<h3>kode_buku tidak boleh kosong</h3>";
				} elseif ($Namab == "") {
					echo "<h3>Nama buku tidak boleh kosong</h3>";
				} elseif ($jenis == "") {
					echo "<h3>kode_jenis tidak boleh kosong</h3>";
				} else {
					$insert = "INSERT INTO buku (kode_buku, nama_buku, kode_jenis) 
								VALUES ('$kodeb','$Namab','$jenis')
							";
					mysqli_query($conn, $insert);
					echo "<h3>Data Berhasil Dimasukkan</h3>";
				}
			
			} elseif ($Ubah) {
				if ($kodeb == "") {
					echo "<h3>kode tidak boleh kosong</h3>";
				} elseif ($Namab == "") {
					echo "<h3>Nama tidak boleh kosong</h3>";
				} elseif ($jenis == "") {
					echo "<h3>kode jenis tidak boleh kosong</h3>";
				} else {
					$update = " UPDATE buku
								SET kode_buku='$kodeb', nama_buku='$Namab', kode_jenis='$jenis'
								WHERE kode_buku = '$kodebl'
							";
					mysqli_query($conn, $update);
					echo "<h3>Data Berhasil Diubah</h3>";
				}
			}
			if ($_GET["hps"]) {
				$kodeb = $_GET["hps"];
				$hapus = "DELETE FROM buku WHERE kode_buku = '$kodeb'";
				mysqli_query($conn, $hapus);
				echo "<h3>Data berhasil di hapus</h3>";
			
			} elseif ($_GET["ubh"]) {
				$kodeb = $_GET["ubh"]; 
				$cari = "SELECT * FROM buku WHERE kode_buku='$kodeb'";
				$hasil = mysqli_query($conn, $cari);
				$data = mysqli_fetch_array($hasil); 
			}
		?>

	
		<form method="post" action="Modul6.php">
			<table>
				<tr>
					<td>kode</td>
					<td>:</td>
					<td> 
						<input type="text" name="kodeb" value="<?php echo $data[0] ?>">
						<input type="hidden" name="kodebl" value="<?php echo $data[0] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<input type="text" name="Namab" value="<?php echo $data[1] ?>">
					</td>
				</tr>
				<tr>
                        <td width='25%'>kode jenis</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <select name=jenis_buku>
                            <?php
                                $sql = "select * from jenis_buku";
                                $re = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($re)){
                                    echo "<option value = '$row[kode_jenis]'>$row[kode_jenis]</option>";
                                }
                            ?>
                            </select>
                        </td>
				<tr>
					<td></td>
					<td></td>
					<td>
						<?php
							if ($data) {
								echo "<input type='submit' name='Ubah' value='Ubah'>";
							} else {
								echo "<input type='submit' name='Submit' value='Submit'>";
							}
						?>
					</td>
				</tr>
			</table>
		</form>

		<hr>

		<table border="1">
			<tr>
				<td>kode</td>
				<td>Nama</td>
				<td>Kode jenis</td>
				<td>Aksi</td>
			</tr>
			<?php
				$cari = "SELECT * FROM buku,jenis_buku where buku.kode_jenis = jenis_buku.kode_jenis";
				$hasil = mysqli_query($conn, $cari);
				while ($data = mysqli_fetch_row($hasil)){
					echo "
						<tr>
							<td>$data[0]</td>
							<td>$data[1]</td>
							<td>$data[2]</td>
							<td>
								<a href='Modul6.php?ubh=$data[0]'>Ubah</a>
								<a href='Modul6.php?hps=$data[0]'>Hapus</a>
							</td>
						</tr>
					";
				}
			?>
		</table>
	</center>
    </body>
</html>