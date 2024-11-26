<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\Column(length: 55)]
    private ?string $type = null;

    /**
     * @var Collection<int, Fournit>
     */
    #[ORM\OneToMany(targetEntity: Fournit::class, mappedBy: 'fournisseur')]
    private Collection $produits;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'Fournisseur')]
    private Collection $product;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Fournit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Fournit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setFournisseur($this);
        }

        return $this;
    }

    public function removeProduit(Fournit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getFournisseur() === $this) {
                $produit->setFournisseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Produit $product): static
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setFournisseur($this);
        }

        return $this;
    }

    public function removeProduct(Produit $product): static
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getFournisseur() === $this) {
                $product->setFournisseur(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return 'whatever you neet to see the type';
    }

}
