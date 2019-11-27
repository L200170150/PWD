<?php
    session_start();
    echo "Anda berhasil login sebagai ".$_SESSION['username']." dan anda terdaftar sebagai ".$_SESSION['status'];
?>
<br>
Silahkan logout dengan menekan link <a href="logout.php"> logout </a>