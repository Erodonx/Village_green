<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\DetailRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;


#[ORM\Entity(repositoryClass: DetailRepository::class)]
#[ApiResource()]
class Detail
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commande:lecture'])]
    private ?int $id=null;

    #[ORM\ManyToOne(inversedBy: 'details')]
    private ?Commande $Commande = null;

    #[ORM\ManyToOne(inversedBy:'details')]
    #[Groups(['commande:lecture'])]
    private ?Produit $Produit = null;

    #[ORM\Column]
    #[Groups(['commande:lecture'])]
    private ?int $quantiteCommandee = null;

    public function getId(): ?int
    {
         return $this->id;
    }

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
