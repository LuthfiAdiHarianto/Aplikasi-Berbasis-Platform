<?php
if (isset($_POST['msg'])) {
    $msg = htmlspecialchars($_POST['msg']);
    echo "Pesan diterima: <b>" . $msg . "</b>";
}
?>