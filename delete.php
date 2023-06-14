<?php
session_start();
require_once('connection.php');
if ($_GET['id'] && !empty($_GET['id'])) {
    $sql = ("SELECT * FROM articles WHERE id=:id");
    $data = $bdd->prepare($sql);
    $id = strip_tags($_GET['id']);
    $data->bindValue(':id', $id, PDO::PARAM_INT);
    $data->execute();
    $article = $data->fetch();
    if ($article) {
        $id = strip_tags($_GET['id']);
        $sql = "DELETE  FROM articles WHERE id=:id";
        $data = $bdd->prepare($sql);
        $data->bindValue(':id', $id, PDO::PARAM_INT);

        $data->execute();
        header('Location:  prod.php');
        $_SESSION['message'] = "votre a bien été supprimé";

    } else {
        header('Location:  prod.php');
        $_SESSION['message'] = "article non trouvé";
    }
}

?>
