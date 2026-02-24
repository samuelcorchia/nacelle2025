<?php
use App\Autoloader;
use Models\Annonces;

require_once "Autoloader.php";
Autoloader::register();

$oAnnonces = new Annonces();
$aResult = $oAnnonces->findAll();

?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($aResult as $aOneResult): ?>
        <?php $oOneResult = $oAnnonces->hydrate($aOneResult); ?>
        <tr>
            <td><?= $oOneResult->getId() ?></td>
            <td><a href="editAnnonce.php?action=edit&id=<?= $oOneResult->getId() ?>"><?= $oOneResult->getTitre() ?></a></td>
            <td><?= $oOneResult->getContenu() ?></td>
            <td><?= $oOneResult->getPrix() ?></td>  
            <td><a href="deleteAnnonce.php?id=<?= $oOneResult->getId() ?>">Supprimer</a></td>
        </tr>
    <?php endforeach ?>
    <tr>
        <td colspan="5"><a href="editAnnonce.php?action=add">Ajouter une annonce</a></td>
    </tr>
</table>
<?php
//$oTest = new Annonces();
//$oAnnonce = $oTest
//    ->setTitre("Annonce 2")
//    ->setContenu("Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.");
//$oTest->add($oAnnonce);


