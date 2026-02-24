<?php
namespace Client;

class Compte
{
    public function __construct(
        protected string $sFirstname,
        protected string $sLastname)
    {
    }

    /**GETTER & SETTERS */
    /* @return string */
    public function getFirstname(): string
    {
        return $this->sFirstname;
    }

    /* @return string */
    public function getLastname(): string
    {
        return $this->sLastname;
    }
    /* @param string $sFirstname */
    public function setFirstname(string $sFirstname): self  
    {
        $this->sFirstname = $sFirstname;
        return $this;
    }       

     /* @param string $sLastname */                     
    public function setLastname(string $sLastname): self
    {
        $this->sLastname = $sLastname;
        return $this;
    }
    
    public function __toString(): string
    {
        return "<pre>" . print_r($this, true) . "</pre>";
    }

}