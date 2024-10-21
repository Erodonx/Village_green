<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $Commande = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom = null;

    /**
     * @var Collection<int, DetailLivraison>
     */
    #[ORM\OneToMany(targetEntity: DetailLivraison::class, mappedBy: 'Livraison', orphanRemoval: true)]
    private Collection $detailLivraisons;

    public function __construct()
    {
        $this->detailLivraisons = new ArrayCollection();
    }


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

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection<int, DetailLivraison>
     */
    public function getDetailLivraisons(): Collection
    {
        return $this->detailLivraisons;
    }

    public function addDetailLivraison(DetailLivraison $detailLivraison): static
    {
        if (!$this->detailLivraisons->contains($detailLivraison)) {
            $this->detailLivraisons->add($detailLivraison);
            $detailLivraison->setLivraison($this);
        }

        return $this;
    }

    public function removeDetailLivraison(DetailLivraison $detailLivraison): static
    {
        if ($this->detailLivraisons->removeElement($detailLivraison)) {
            // set the owning side to null (unless already changed)
            if ($detailLivraison->getLivraison() === $this) {
                $detailLivraison->setLivraison(null);
            }
        }

        return $this;
    }
}
