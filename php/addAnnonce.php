<?php 
use App\Autoloader;
use Models\Annonces;

require_once "Autoloader.php";
Autoloader::register();

$sTitre = $_POST['titre'] ?? null;
$sDescription = $_POST['description'] ?? null;
$sPrix = $_POST['prix'] ?? null;

$oAnnonce = new Annonces();
$oAnnonce
    ->setTitre($sTitre)
    ->setContenu($sDescription)
    ->setPrix($sPrix);
$oAnnonce->add($oAnnonce);

header("Location: listAnnonces.php");
exit();