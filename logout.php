<?php
    session_start();
    unset($_SESSION['prenom']);
    unset($_SESSION['nom']);
?>
    <script>
        document.location.href = "index.php";
    </script>
