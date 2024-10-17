<?php

namespace App\Entity;

use App\Repository\RequeteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequeteRepository::class)]
class Requete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Sujet = null;

    #[ORM\ManyToOne(inversedBy: 'requetes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $client = null;

    #[ORM\ManyToOne(inversedBy: 'requetesEmploye')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $employeMess = null;
    /**
     * @var Collection<int, ContenuRequete>
     */
    #[ORM\OneToMany(targetEntity: ContenuRequete::class, mappedBy: 'Requete')]
    private Collection $contenuRequetes;

    public function __construct()
    {
        $this->contenuRequetes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujet(): ?string
    {
        return $this->Sujet;
    }

    public function setSujet(string $Sujet): static
    {
        $this->Sujet = $Sujet;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getEmployeMess(): ?User
    {
        return $this->employeMess;
    }
    public function setEmployeMess(?User $employeMess): static
    {
        $this->employeMess = $employeMess;
        
        return $this;
    }
    /**
     * @return Collection<int, ContenuRequete>
     */
    public function getContenuRequetes(): Collection
    {
        return $this->contenuRequetes;
    }

    public function addContenuRequete(ContenuRequete $contenuRequete): static
    {
        if (!$this->contenuRequetes->contains($contenuRequete)) {
            $this->contenuRequetes->add($contenuRequete);
            $contenuRequete->setRequete($this);
        }

        return $this;
    }

    public function removeContenuRequete(ContenuRequete $contenuRequete): static
    {
        if ($this->contenuRequetes->removeElement($contenuRequete)) {
            // set the owning side to null (unless already changed)
            if ($contenuRequete->getRequete() === $this) {
                $contenuRequete->setRequete(null);
            }
        }

        return $this;
    }
}
