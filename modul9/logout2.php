<?php
    session_start();
    session_destroy();
?>
<script language="Javascript">
    alert("Anda telah logout");
    document.location="tugas.php";
</script>