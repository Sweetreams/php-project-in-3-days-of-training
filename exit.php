<?php
    setcookie("JWS", "", time() - 1, "/");
    setcookie("id", "", time() - 1, "/");
    header("Location: /index.php");
?>