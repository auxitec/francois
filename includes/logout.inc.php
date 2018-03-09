<?php
$_SESSION['login'] = false;
session_destroy();
echo "<script>redirection(\"index.php?page=accueil\");</script>";
