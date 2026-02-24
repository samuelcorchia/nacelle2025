<?php
namespace Banque;

use Client\Compte as CompteClient;

class CompteCourant extends Compte
{
    /* @param CompteClient $oTitulaire */
    protected CompteClient $oTitulaire;

    /* @param float $fSolde */
    protected float $fSolde;

    /* @param float $fDecouvert */
    protected float $fDecouvert;
    
    /* @param CompteClient $oTitulaire
     * @param float $fSolde
     * @param float $fDecouvert
     */
    public function __construct(
        CompteClient $oTitulaire,
        float $fSolde,
        float $fDecouvert = 0.00
    )
    {
        parent::__construct($oTitulaire, $fSolde);
        $this->fDecouvert = $fDecouvert;
    }

    /* @param float $fDecouvert */
    public function getDecouvert(): float
    {
        return $this->fDecouvert;
    }
    
    /* @param float $fDecouvert */
    public function setDecouvert(float $fDecouvert): self
    {
        $this->fDecouvert = $fDecouvert;
        return $this;
    }
}