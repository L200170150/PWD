<?php
if(isset($_GET['nim'])) {
    $dbc=mysqli_connect('localhost','root','') or die ('Koneksi Gagal');
    mysqli_select_db($dbc, 'informatika');
    // cek mahasiswa
    $nim=mysql_real_escape_string($_GET['nim']);
    $query=mysqli_query($dbc,"SELECT * FROM mahasiswa WHERE NIM='$nim'");
    if(mysqli_num_rows($query) == 0) {
        echo "<script>alert('Tidak Ada data Mahasiswa..');window.location='./form.php';</script>";
        exit;
    } else {
        $query=mysqli_query($dbc, "DELETE FROM mahasiswa WHERE NIM='$nim'");
        if($query) {
            echo "<script>alert('Data Berhasil Dihapus');window.location='./form.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus');window.location='./form.php';</script>";
        }
    }
} else {
    echo "Mau Apa ??";
}
?>