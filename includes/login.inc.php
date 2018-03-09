<h1>Login</h1>

<?php
if (isset($_POST['frmLogin'])) {
    $mail = $_POST['mail'] ?? "";
    $mdp = $_POST['mdp'] ?? "";

    $erreurs = array();

    if ($mail == "") array_push($erreurs, "Merci de saisir une adresse mail");
    if ($mdp == "") array_push($erreurs, "Merci de saisir un mot de passe");

    if (count($erreurs) > 0) {
        $messageErreur = "<ul>";

        for ($i = 0 ; $i < count($erreurs) ; $i++) {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }

        $messageErreur .= "</ul>";

        echo $messageErreur;
        include "frmLogin.php";
    }

    else {
        $requete = new Requetes();
        $mdp = sha1($mdp);

        $sql = "SELECT * FROM t_users
                WHERE usemail='$mail'
                AND usepassword='$mdp'
                AND usemailconfirm=1";

        $result = $requete -> select($sql);

        if ($result -> rowCount() > 0) {
            $enreg = $result -> fetch();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $enreg -> id_users;
            $_SESSION['nom'] = $enreg -> usenom;
            $_SESSION['prenom'] = $enreg -> useprenom;

            echo "<script>redirection(\"index.php?page=accueil\");</script>";
        }

        else {
            Log::logWrite("Erreur login");
            echo "<p>Try again</p>";
        }
    }

}

else {
    include "frmLogin.php";
}