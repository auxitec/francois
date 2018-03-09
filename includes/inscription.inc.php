<h1>Inscription</h1>
<?php
if (isset($_POST['frmInscription'])) {
    $nom = $_POST['nom'] ?? "";
    $prenom = $_POST['prenom'] ?? "";
    $mail = $_POST['mail'] ?? "";
    $mdp = $_POST['mdp'] ?? "";

    $erreurs = array();

    if ($nom == "") array_push($erreurs, "Merci de saisir un nom");
    if ($prenom == "") array_push($erreurs, "Merci de saisir un prénom");
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
        include "frmInscription.php";
    }

    else {
        $requete = new Requetes();
        $mdp = sha1($mdp);

        $sql = "INSERT INTO t_users (usenom, useprenom, usemail, usepassword, id_groupes)
                VALUES ('$nom', '$prenom', '$mail', '$mdp', 1)";

        if ($requete -> insert($sql)) {
            $lastId = $requete -> getLastId();
            $lastId = hash('sha256', $lastId);
            $message = "<h1>Confirmation mail</h1>";
            $message .= "<p>Pour confirmer votre compte, cliquer ";
            $message .= "<a href='http://localhost/Auxitec2/index.php?";
            $message .= "page=validationInscription&amp;mail=";
            $message .= $mail;
            $message .= "&amp;id=";
            $message .= $lastId;
            $message .= "' ";
            $message .= "target='_blank'>ici</a></p>";



            mail($mail, 'Confirmation compte', $message);
            echo "<p>Inscription OK</p>";
        }





        else {
            Log::logWrite("Erreur inscription");
            echo "<p>Try again</p>";
        }
    }

}

else {
    include "frmInscription.php";
}