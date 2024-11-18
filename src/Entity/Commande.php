<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['commande:lecture']])]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['commande:lecture'])]
    private ?\DateTimeImmutable $dateCommande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Groups(['commande:lecture'])]
    private ?string $montantCommandeHT = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Groups(['commande:lecture'])]
    private ?string $montantCommandeTTC = null;

    #[ORM\Column(length: 55)]
    #[Groups(['commande:lecture'])]
    private ?string $moyenDePaiement = null;

    #[ORM\Column(length: 100)]
    #[Groups(['commande:lecture'])]
    private ?string $adresseFacturation = null;

    #[ORM\Column(length: 100)]
    #[Groups(['commande:lecture'])]
    private ?string $villeFacturation = null;

    #[ORM\Column(length: 100)]
    #[Groups(['commande:lecture'])]
    private ?string $villeLivraison = null;

    #[ORM\Column(length: 50)]
    #[Groups(['commande:lecture'])]
    private ?string $etatLivraison = null;

    #[ORM\Column]
    #[Groups(['commande:lecture'])]
    private ?bool $reduction = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false, /*referencedColumnName:'email'*/)]
    private ?User $user = null;

    /**
     * @var Collection<int, Detail>
     */
    #[ORM\OneToMany(targetEntity: Detail::class, mappedBy: 'Commande', orphanRemoval: true)]
    #[Groups(['commande:lecture'])]
    private Collection $details;

    #[ORM\Column(length: 100)]
    #[Groups(['commande:lecture'])]
    private ?string $adresseLivraison = null;

    #[ORM\Column(length: 5, nullable: true)]
    #[Groups(['commande:lecture'])]
    private ?string $valeurReduction = null;

    /**
     * @var Collection<int, Livraison>
     */
    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'Commande', orphanRemoval: true)]
    private Collection $livraisons;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->livraisons = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getMontantCommandeHT(): ?string
    {
        return $this->montantCommandeHT;
    }

    public function setMontantCommandeHT(string $montantCommandeHT): static
    {
        $this->montantCommandeHT = $montantCommandeHT;

        return $this;
    }

    public function getMontantCommandeTTC(): ?string
    {
        return $this->montantCommandeTTC;
    }

    public function setMontantCommandeTTC(string $montantCommandeTTC): static
    {
        $this->montantCommandeTTC = $montantCommandeTTC;

        return $this;
    }

    public function getMoyenDePaiement(): ?string
    {
        return $this->moyenDePaiement;
    }

    public function setMoyenDePaiement(string $moyenDePaiement): static
    {
        $this->moyenDePaiement = $moyenDePaiement;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation(string $adresseFacturation): static
    {
        $this->adresseFacturation = $adresseFacturation;

        return $this;
    }

    public function getVilleFacturation(): ?string
    {
        return $this->villeFacturation;
    }

    public function setVilleFacturation(string $villeFacturation): static
    {
        $this->villeFacturation = $villeFacturation;

        return $this;
    }

    public function getVilleLivraison(): ?string
    {
        return $this->villeLivraison;
    }

    public function setVilleLivraison(string $villeLivraison): static
    {
        $this->villeLivraison = $villeLivraison;

        return $this;
    }

    public function getEtatLivraison(): ?string
    {
        return $this->etatLivraison;
    }

    public function setEtatLivraison(string $etatLivraison): static
    {
        $this->etatLivraison = $etatLivraison;

        return $this;
    }

    public function isReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(bool $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): static
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setCommande($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): static
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getCommande() === $this) {
                $detail->setCommande(null);
            }
        }

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresseLivraison;
    }

    public function setAdresseLivraison(string $adresseLivraison): static
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    public function getValeurReduction(): ?string
    {
        return $this->valeurReduction;
    }

    public function setValeurReduction(?string $valeurReduction): static
    {
        $this->valeurReduction = $valeurReduction;

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons->add($livraison);
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }
}
