<header>
    <nav>
        <li><a href="index.php?page=accueil">Accueil</a></li>
        <li><a href="index.php?page=inscription">Inscription</a></li>
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            $url = "<li><a href=\"index.php?page=logout\">Logout</a></li>";
        }
        else {
            $url = "<li><a href=\"index.php?page=login\">Login</a></li>";
        }

        echo $url;
        ?>
    </nav>
</header>