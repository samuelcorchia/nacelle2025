<?php
namespace Models;

use DateTime;
use Models\Model;

class Annonces extends Model
{
    protected int $id;
    protected string $titre;
    protected string $prix;
    protected string $contenu;
    protected DateTime $created_at;

    public function __construct()
    {
        $this->sTable = "annonces";
    }

    public function getPrix(): string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getTitre(): string
    {
        return $this->titre;
    }   
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }
    public function getContenu(): string
    {
        return $this->contenu;
    }
    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }   
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }   
    public function setCreatedAt(DateTime $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }
}