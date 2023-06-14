<?php
require_once('connection.php');
session_start();

if ($_GET['id'] && !empty($_GET['id'])) {
    $sql = ("SELECT * FROM vente WHERE id=:id");
    $data = $bdd->prepare($sql);
    $id = strip_tags($_GET['id']);
    $data->bindValue(':id', $id, PDO::PARAM_INT);
    $data->execute();
    $vente = $data->fetch();
    if ($vente) {
        $id = strip_tags($_GET['id']);
        $sql = "DELETE  FROM vente WHERE id=:id";
        $data = $bdd->prepare($sql);
        $data->bindValue(':id', $id, PDO::PARAM_INT);

        $data->execute();
        header('Location:  Vente.php');
        $_SESSION['message'] = "votre a bien été supprimé";

    } else {
        header('Location:  Vente.php');
        $_SESSION['message'] = "article non trouvé";
    }
}

?>
