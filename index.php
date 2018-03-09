<?php
@session_start();
var_dump($_SESSION);
ini_set("smtp_port", 1025);
include "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Auxitec Blog</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script type="text/javascript" src="./assets/javascript/redirection.js"></script>
</head>
<body>
<div id="container">
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
?>
</div>
</body>
</html>


