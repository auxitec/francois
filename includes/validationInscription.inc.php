<h1>Validation inscription</h1>
<?php
if (isset($_GET['mail']) && isset($_GET['id'])) {
    $mail = $_GET['mail'];
    $id = $_GET['id'];

    $requete = new Requetes();

    $sql = "UPDATE t_users
            SET usemailconfirm=1
            WHERE usemail='$mail'
            AND SHA2(id_users, 256)='$id'";

    if ($requete -> update($sql) > 0) {
        $message = "<p>Votre compte est confirmé</p>";
    }

    else {
        $message = "<p>Erreur de confirmation</p>";
        Log::logWrite("Erreur confirmation mail");
    }
    echo $message;
}
