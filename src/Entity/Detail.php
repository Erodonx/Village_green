<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\DetailRepository;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $reduction = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $PrixTotalTTC = null;

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

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(?string $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getPrixTotalTTC(): ?string
    {
        return $this->PrixTotalTTC;
    }

    public function setPrixTotalTTC(string $PrixTotalTTC): static
    {
        $this->PrixTotalTTC = $PrixTotalTTC;

        return $this;
    }
}
