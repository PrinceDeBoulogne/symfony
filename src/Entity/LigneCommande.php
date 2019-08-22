<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneCommandeRepository")
 */
class LigneCommande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroCommande;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroSupport;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande", inversedBy="ligneCommandes")
     */
    private $commandeId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Support", inversedBy="ligneCommandeId")
     */
    private $support;

    public function getId(): ?int
    {
        return $this->id;
    }
    

    public function getNumeroCommande(): ?int
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(int $numeroCommande): self
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }

    public function getNumeroSupport(): ?int
    {
        return $this->numeroSupport;
    }

    public function setNumeroSupport(int $numeroSupport): self
    {
        $this->numeroSupport = $numeroSupport;

        return $this;
    }

    public function getCommandeId(): ?Commande
    {
        return $this->commandeId;
    }

    public function setCommandeId(?Commande $commandeId): self
    {
        $this->commandeId = $commandeId;

        return $this;
    }

    public function getSupport(): ?Support
    {
        return $this->support;
    }

    public function setSupport(?Support $support): self
    {
        $this->support = $support;

        return $this;
    }
}
