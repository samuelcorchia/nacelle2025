<?php
namespace Banque;

use Client\Compte as CompteClient;

abstract class Compte
{
    /*
    * @param CompteClient $oTitulaire
    * @param float $fSolde
    */
    public function __construct(
        protected CompteClient $oTitulaire,
        protected float $fSolde
    )
    {
    }

    /**GETTER & SETTERS */
    /* @return CompteClient */
    public function getTitulaire(): CompteClient

    {
        return $this->oTitulaire;
    }

    /* @return float */
    public function getSolde(): float
    {
        return $this->fSolde;
    }

    /* @param CompteClient $oTitulaire */
    public function setTitulaire(CompteClient $oTitulaire): self
    {
        $this->oTitulaire = $oTitulaire;
        return $this;
    }

    /* @param float $fSolde */
    public function setSolde(float|int $fSolde): self
    {
        $this->fSolde = $fSolde;
        return $this;
    }

    /* Deposer un montant sur le compte, en vérifiant que le montant est positif 
        @param float $fMontant
        @return void
    */    
    public function deposer(float $fMontant): void
    {
        if ($fMontant < 0) {
            throw new Exception("Le montant à deposer doit etre positif.");
        }
        $this->fSolde += $fMontant;
    }

    /* Retire un montant du compte, en vérifiant que le montant est positif et que le compte est solvable 
        @param float $fMontant
        @return void
    */
    public function retirer(float $fMontant): void
    {
        if ($fMontant < 0) {
            throw new Exception("Le montant à deposer doit etre positif.");
        } elseif ($fMontant > $this->fSolde) {
            throw new Exception("Le montant à retirer est supérieur au solde du compte.");
        }
        $this->fSolde -= $fMontant;
    }

    /* Transfère un montant d'un compte à un autre, en vérifiant que le montant est positif et que le compte est solvable 
        @param float $fMontant
        @param Compte $oCompteDestinataire
        @return void
    */
    public function transferer(float $fMontant, Compte $oCompteDestinataire): void
    {
        $this->retirer($fMontant);
        $oCompteDestinataire->deposer($fMontant);
    }

    /* Affiche les informations du compte       
        @return void
    */
    public function __toString(): string
    {
        return "<pre>" . print_r($this, true) . "</pre>";
    }
}