<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;


    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $Commande = null;

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $Produit = null;

    #[ORM\Column]
    private ?int $quantiteCommandee = null;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getCommande(): ?Commande
    {
        return $this->Commande;
    }

    public function setCommande(?Commande $Commande): static
    {
        $this->Commande = $Commande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): static
    {
        $this->Produit = $Produit;

        return $this;
    }

    public function getQuantiteCommandee(): ?int
    {
        return $this->quantiteCommandee;
    }

    public function setQuantiteCommandee(int $quantiteCommandee): static
    {
        $this->quantiteCommandee = $quantiteCommandee;

        return $this;
    }
}
