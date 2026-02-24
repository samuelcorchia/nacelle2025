<?php 
use App\Autoloader;
use Models\Annonces;

require_once "Autoloader.php";
Autoloader::register();

$oAnnonce = new Annonces();
$oAnnonce->delete($_GET['id']);

header("Location: listAnnonces.php");
exit();