<?php
session_start();
require_once('connection.php');
if ($_GET['id'] && !empty($_GET['id'])) {
    $sql = ("SELECT * FROM compte WHERE id=:id");
    $data = $bdd->prepare($sql);
    $id = strip_tags($_GET['id']);
    $data->bindValue(':id', $id, PDO::PARAM_INT);
    $data->execute();
    $compte = $data->fetch();
    if ($compte) {
        $id = strip_tags($_GET['id']);
        $sql = "DELETE  FROM compte WHERE id=:id";
        $data = $bdd->prepare($sql);
        $data->bindValue(':id', $id, PDO::PARAM_INT);

        $data->execute();
        header('Location:  users.php');
        $_SESSION['message'] = "votre a bien été supprimé";

    } else {
        header('Location:  users.php');
        $_SESSION['message'] = "article non trouvé";
    }
}

?>
