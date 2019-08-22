<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StreamingRepository")
 */
class Streaming
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titreMorceau;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $qualite;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="streamings")
     */
    private $produitId;
    
    
    public function __construct()
    {
        $this->userId = new ArrayCollection();
    }
    
    // public function __toString()
    // {
    //     return $this->;
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreMorceau(): ?string
    {
        return $this->titreMorceau;
    }

    public function setTitreMorceau(string $titreMorceau): self
    {
        $this->titreMorceau = $titreMorceau;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(?string $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getProduitId(): ?Produit
    {
        return $this->produitId;
    }

    public function setProduitId(?Produit $produitId): self
    {
        $this->produitId = $produitId;

        return $this;
    }
}
