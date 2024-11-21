<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify; //transformer une chaîne de caractères en Slug.
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[Vich\Uploadable]
#[ApiResource()]
class Produit 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(/*['produit.index'],*/['commande:lecture'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(/*['produit.index'],*/['commande:lecture'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['produit.index'])]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix_HT = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty:'image')]
    #[Assert\Image()]
    private ?File $imageFile = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    //#[Groups(['produit.show'])]
    private ?SousRubrique $sousRubrique = null;

    /**
     * @var Collection<int, Details>
     */
    #[ORM\OneToMany(mappedBy:'Produit', targetEntity:Detail::class)]
    private Collection $details;

    
    public function __construct1()
    {
        $this->details = new ArrayCollection();
    }

    /**
     * @var Collection<int, Fournit>
     */
    #[ORM\OneToMany(targetEntity: Fournit::class, mappedBy: 'produit', cascade:['remove'])]
    private Collection $fournisseurs;

    #[ORM\ManyToOne(inversedBy: 'product')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $Fournisseur = null;

    /**
     * @var Collection<int, DetailLivraison>
     */
    #[ORM\OneToMany(targetEntity: DetailLivraison::class, mappedBy: 'Produit', orphanRemoval: true)]
    private Collection $detailLivraisons;


    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
        $this->detailLivraisons = new ArrayCollection();
        
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixHT(): ?float
    {
        return $this->prix_HT;
    }

    public function setPrixHT(float $prix_HT): static
    {
        $this->prix_HT = $prix_HT;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getFormattedPrice(): string
    {
        return number_format($this->prix_HT, 0 ,'',' '); //Tuto graphicart, ça renvoie une chaîne de caractère pour une plus belle mise en page.
    }
    public function getSlug(): string 
    {
        return $slugify = (new Slugify())->slugify($this->nom);
    }

    public function getSousRubrique(): ?SousRubrique
    {
        return $this->sousRubrique;
    }

    public function setSousRubrique(?SousRubrique $sousRubrique): static
    {
        $this->sousRubrique = $sousRubrique;

        return $this;
    }
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function setImageFile(?File $imageFile): static
    {
        $this->imageFile = $imageFile;
        
        return $this;
    }

    /**
     * @return Collection<int, Fournit>
     */
    public function getFournisseurs(): Collection
    {
        return $this->fournisseurs;
    }

    public function addFournisseur(Fournit $fournisseur): static
    {
        if (!$this->fournisseurs->contains($fournisseur)) {
            $this->fournisseurs->add($fournisseur);
            $fournisseur->setProduit($this);
        }

        return $this;
    }

    public function removeFournisseur(Fournit $fournisseur): static
    {
        if ($this->fournisseurs->removeElement($fournisseur)) {
            // set the owning side to null (unless already changed)
            if ($fournisseur->getProduit() === $this) {
                $fournisseur->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */

    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->Fournisseur;
    }

    public function setFournisseur(?Fournisseur $Fournisseur): static
    {
        $this->Fournisseur = $Fournisseur;

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
            $detailLivraison->setProduit($this);
        }

        return $this;
    }

    public function removeDetailLivraison(DetailLivraison $detailLivraison): static
    {
        if ($this->detailLivraisons->removeElement($detailLivraison)) {
            // set the owning side to null (unless already changed)
            if ($detailLivraison->getProduit() === $this) {
                $detailLivraison->setProduit(null);
            }
        }

        return $this;
    }
}
