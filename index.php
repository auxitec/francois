<?php
include "./includes/header.php";

$page = (isset($_GET['page']) && $_GET['page'] != "") ? $_GET['page'] : "accueil";
$page = "./includes/" . $page . ".inc.php";

$files = glob("./includes/*.inc.php");

if (in_array($page, $files)) {
    include $page;
}

else {
    include "./includes/accueil.inc.php";
}

include "./includes/footer.php";
