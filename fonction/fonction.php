<?php
function getFlash()
{
    if (!isset($_SESSION['flash'])) {
        return "";
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    $class = $flash['type'] == 'error' ? 'danger' : $flash['flash'];
    $html = '<div class="alert alert-' . $class . '">';

    if (is_array($flash['text'])) {
        $html .= "<ul>";
        foreach ($flash['text'] as $text) {
            $html .= '<li>' . $text . '</li>';
        }
        $html .= "</ul>";
    } else {
        $html .= $flash['text'];
    }
    $html .= "</div>";
    return $html;
}




function isProductExists($productName) {
    global $bdd;

    $query = $bdd->prepare("SELECT COUNT(*) AS count FROM articles WHERE nom = :nom");
    $query->bindValue(':nom', $productName, PDO::PARAM_STR);
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $count = $row['count'];

    return $count > 0;
}


function updateProductQuantity($productName, $quantity) {
    global $bdd;

    // Vérifier si le produit existe
    $query = $bdd->prepare("SELECT quantite FROM articles WHERE nom = :productName");
    $query->bindValue(':productName', $productName, PDO::PARAM_STR);
    $query->execute();

    $product = $query->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $currentQuantity = $product['quantite'];

        // Vérifier si la quantité est suffisante
        if ($currentQuantity >= $quantity) {
            $newQuantity = $currentQuantity - $quantity;

            // Mettre à jour la quantité du produit dans la base de données
            $updateQuery = $bdd->prepare("UPDATE articles SET quantite = :newQuantity WHERE nom = :productName");
            $updateQuery->bindValue(':newQuantity', $newQuantity, PDO::PARAM_INT);
            $updateQuery->bindValue(':productName', $productName, PDO::PARAM_STR);
            $updateQuery->execute();

            return true; // La mise à jour de la quantité a été effectuée avec succès
        } else {
            return false; // La quantité disponible est insuffisante
        }
    }

    return false; // Le produit n'existe pas dans la base de données
}

if(!function_exists('notEmpty')){
    function notEmpty($obj){
        foreach ($obj as $key=>$value){
            if (empty($value) || trim($value)==""){
                return false;
          }
        }
        return true;

    }
}

if(!function_exists('InputSaveData')){
    function InputSaveData(){
        foreach($_POST as $key => $value){
            if($key !='password' && $key!= 'confirmPassword'){
                $_SESSION['input'][$key]=$value;
            }
        }
    }
}
if (!function_exists('clearInputData')){
    function clearInputData(){
        $_SESSION['input']=[];
    }

}
