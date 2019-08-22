<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupportRepository")
 */
class Support
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typeSupport;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="supports")
     */
    private $produitId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneCommande", mappedBy="support")
     */
    private $ligneCommandeId;

    public function __construct()
    {
        $this->ligneCommandeId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeSupport(): ?string
    {
        return $this->typeSupport;
    }

    public function setTypeSupport(string $typeSupport): self
    {
        $this->typeSupport = $typeSupport;

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

    /**
     * @return Collection|LigneCommande[]
     */
    public function getLigneCommandeId(): Collection
    {
        return $this->ligneCommandeId;
    }

    public function addLigneCommandeId(LigneCommande $ligneCommandeId): self
    {
        if (!$this->ligneCommandeId->contains($ligneCommandeId)) {
            $this->ligneCommandeId[] = $ligneCommandeId;
            $ligneCommandeId->setSupport($this);
        }

        return $this;
    }

    public function removeLigneCommandeId(LigneCommande $ligneCommandeId): self
    {
        if ($this->ligneCommandeId->contains($ligneCommandeId)) {
            $this->ligneCommandeId->removeElement($ligneCommandeId);
            // set the owning side to null (unless already changed)
            if ($ligneCommandeId->getSupport() === $this) {
                $ligneCommandeId->setSupport(null);
            }
        }

        return $this;
    }
}
