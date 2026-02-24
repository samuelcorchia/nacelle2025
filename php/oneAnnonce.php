<?php
use App\Autoloader;
use Models\Annonces;

require_once "Autoloader.php";
Autoloader::register();

$oAnnonces = new Annonces();
$oResult = $oAnnonces->hydrate($oAnnonces->findById($_GET['id']));

echo "<p>ID : " . $oResult->getId() . "</p>";
echo "<h2>" . $oResult->getTitre() . "</h2>";
echo "<p>" . $oResult->getContenu() . "</p>";