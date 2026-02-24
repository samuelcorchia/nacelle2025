<?php
namespace Banque;

use Client\Compte as CompteClient;

class CompteEpargne extends Compte
{
    private float $fTauxInteret;

    /* @param CompteClient $oTitulaire
     * @param float $fSolde
     * @param float $fTauxInteret
     */
    public function __construct(
        CompteClient $oTitulaire,
        float $fSolde,
        float $fTauxInteret
    )
    {
        parent::__construct($oTitulaire, $fSolde);
        $this->fTauxInteret = $fTauxInteret;
    }

    /* @param float $fTauxInteret */
    public function getTauxInteret(): float
    {
        return $this->fTauxInteret;
    }    

    /* @param float $fTauxInteret */
    public function setTauxInteret(float $fTauxInteret): self
    {
        $this->fTauxInteret = $fTauxInteret;
        return $this;
    }
}