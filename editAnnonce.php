<?php 
use Models\Annonces;
use App\Autoloader;
require_once "Autoloader.php";
Autoloader::register();

$sTitle = $_GET["action"] == "add" ? "Ajouter une annonce" : "Editer une annonce"; 
$sFormAction = $_GET["action"] == "add" ? "addAnnonce.php" : "updateAnnonce.php";
if ($_GET["action"] == "edit") {
    $oAnnonces = new Annonces();
    $oResult = $oAnnonces->hydrate($oAnnonces->findById($_GET['id']));
}
?>
<h1><?= $sTitle ?></h1>
<form method="post" action="<?= $sFormAction ?>">
    <input type="text" name="titre" placeholder="Titre de l'annonce" value="<?= $oResult?->getTitre() ?? '' ?>" />
    <input type="text" name="description" placeholder="Description de l'annonce" value="<?= $oResult?->getContenu() ?? '' ?>" />
    <input type="text" name="prix" placeholder="Prix de l'annonce" value="<?= $oResult?->getPrix() ?? '' ?>" />
    <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>" />
    <input type="hidden" name="action" value="<?= $_GET['action'] ?>" />
    <input type="submit" value="<?= $sTitle ?>" />
</form>