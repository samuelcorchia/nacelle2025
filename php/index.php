<?php
use App\Autoloader;
use Client\Compte as CompteClient;
use Banque\{
    Compte,
    CompteCourant,
    CompteEpargne
};

require_once "classes/Autoloader.php";
Autoloader::register();

var_dump($_SERVER);
echo "Bienvenue ouech Samuel";

$oNewCompteClient = new CompteClient("paulette", "tenaud");
$oNewCompteCourantClient = new CompteCourant($oNewCompteClient, 10);
echo $oNewCompteCourantClient;
//die($oNewCompteCourantClient);
echo "Le client : " 
    . ucfirst($oNewCompteCourantClient->getTitulaire()->getFirstname()) . " " 
    . strtoupper($oNewCompteCourantClient->getTitulaire()->getLastname()) 
    . " a un solde de : " . $oNewCompteCourantClient->getSolde()
    . " &euro; et un découvert autorisé de : " . $oNewCompteCourantClient->getDecouvert() . " &euro;";
echo "<hr />";
$oCompte1 = new CompteClient("samuel", "corchia");
$oCompte2 = new CompteClient("sohane", "corchia");
$oCompte1->setFirstname("melissa");
echo $oCompte1;
echo "<hr />";
echo $oCompte2;
echo "<hr />";

/* Exemples d'utilisation de la classe CompteCourant
 * @see CompteCourant
*/
$oCompte = new CompteCourant($oCompte1, 1000.50, 200);
$oCompte->setDecouvert(500);
echo $oCompte;
echo "<hr />";

/* Deposer un montant sur le compte, en vérifiant que le montant est positif 
    @param float $fMontant
    @return void
*/
$oCompte->deposer(500);
echo $oCompte;
echo "<hr />";
/* Retirer un montant du compte, en vérifiant que le montant est positif et que le solde est suffisant
    @param float $fMontant
    @return void
*/
$oCompte->retirer(15);
echo $oCompte;
echo "<hr />";
/* Transférer un montant d'un compte à un autre, en vérifiant que le montant est positif et que le solde est suffisant
    @param float $fMontant
    @param Compte $oCompteDestinataire
    @return void
*/
$oCompte2 = new CompteCourant($oCompte2, 0.75);
echo $oCompte2;
echo "<hr />";

$oCompte->transferer($oCompte->getSolde(), $oCompte2);
echo "Compte initial : " . $oCompte;
echo "<hr />";  
echo "Compte destinataire : " . $oCompte2;
echo "<hr />";

$oCompteEpargne = new CompteEpargne($oCompte1, 1000.50, 0.05);
echo "Compte épargne : " . $oCompteEpargne;
echo "<hr />";
//$oPersonnage = new Lutin();
//echo $oPersonnage;
die;

require_once "Utils.php";

/** Exemples d'utilisation de la classe Customer
 * @see Customer
*/
class Customer {
    
    // Constructeur à la volée (PHP 8.0+)
    public function __construct(public int $iCustomerId, public string $sCustomerName, public ?DateTime $dCustomerBirthDate = null) {
    }

    /* GETTERS */
    public function getCustomerId(): int {
        return $this->iCustomerId;
    }

    public function getCustomerName(): string {
        return $this->sCustomerName;
    }

    public function getCustomerBirthDate(): ?DateTime {
        return $this->dCustomerBirthDate;
    }

    /* SETTERS */
    public function setCustomerId(int $iCustomerId): void {
        $this->iCustomerId = $iCustomerId;
    }

    public function setCustomerName(string $sCustomerName): void {
        $this->sCustomerName = $sCustomerName;
    }

    public function setCustomerBirthDate(?DateTime $dCustomerBirthDate): void {
        $this->dCustomerBirthDate = $dCustomerBirthDate;
    }
}

/* Exemples d'utilisation de la classe Customer
 * @see Customer
*/
$oCustomer1 = new Customer(1, "John Doe", new DateTime('1980-12-20 19:00:20'));
var_dump($oCustomer1);
echo "<hr />";

// Affichage de la propriété sCustomerName sans utiliser le getter
echo $oCustomer1->sCustomerName;
echo "<hr />";

// Nullsafe operator (PHP 8.0+)
$sBirthdata = $oCustomer1->getCustomerBirthDate()?->format('d/m/Y H:i:s');
var_dump($sBirthdata);
echo "<hr />";

// Use str_contains (PHP 8.0+) to check if the customer's name contains a specific string
$sStringToFind = "oe";
echo str_contains($oCustomer1->getCustomerName(), $sStringToFind) ? 
    "Le nom du client est : " . $oCustomer1->getCustomerName() . " et il contient la chaine : " . $sStringToFind
    : "Le nom du client est : " . $oCustomer1->getCustomerName() . " et il ne contient pas la chaine : " . $sStringToFind;
echo "<hr />";

// Use str_starts_with (PHP 8.0+) to check if the customer's name starts with a specific string
echo str_starts_with($oCustomer1->getCustomerName(), $sStringToFind) ? 
    "Le nom du client est : " . $oCustomer1->getCustomerName() . " et il commence par la chaine : " . $sStringToFind
    : "Le nom du client est : " . $oCustomer1->getCustomerName() . " et il ne commence pas par la chaine : " . $sStringToFind;
echo "<hr />";

// Use str_ends_with (PHP 8.0+) to check if the customer's name ends with a specific string
echo str_ends_with($oCustomer1->getCustomerName(), $sStringToFind) ? 
    "Le nom du client est : " . $oCustomer1->getCustomerName() . " et il termine par la chaine : " . $sStringToFind
    : "Le nom du client est : " . $oCustomer1->getCustomerName() . " et il ne termine pas par la chaine : " . $sStringToFind;
echo "<hr />";

// Pipe operator (PHP 8.1+)
echo $oCustomer1->getCustomerName() 
    |> trim(...)
    |> (fn (string $string) => str_replace(' ', ' et son prenom est ', $string))
    |> (fn (string $string) => str_replace($sStringToFind, 'oigte moi !!!', $string))
    |> strtoupper(...);
echo "<hr />";

echo "Proverbe du jour: <br />";
$sCitation = Utils::getCitationOfTheDay();
$aCitation = $sCitation |> str_split(...);

//print_r($aCitation);
$aCitationReverse = array_reverse($aCitation);
$sCitationReverse = implode("", $aCitationReverse);
echo $sCitation . "<hr />";
echo $sCitationReverse . "<hr />";
die;
print_r($aCitationReverse);
echo "<hr />";
