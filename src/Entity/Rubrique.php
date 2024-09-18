<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RubriqueRepository::class)]
class Rubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, SousRubrique>
     */
    #[ORM\OneToMany(targetEntity: SousRubrique::class, mappedBy: 'rubrique')]
    private Collection $sousrubrique;

    public function __construct()
    {
        $this->sousrubrique = new ArrayCollection();
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

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    /**
     * @return Collection<int, SousRubrique>
     */
    public function getSousrubrique(): Collection
    {
        return $this->sousrubrique;
    }

    public function addSousrubrique(SousRubrique $sousrubrique): static
    {
        if (!$this->sousrubrique->contains($sousrubrique)) {
            $this->sousrubrique->add($sousrubrique);
            $sousrubrique->setRubrique($this);
        }

        return $this;
    }

    public function removeSousrubrique(SousRubrique $sousrubrique): static
    {
        if ($this->sousrubrique->removeElement($sousrubrique)) {
            // set the owning side to null (unless already changed)
            if ($sousrubrique->getRubrique() === $this) {
                $sousrubrique->setRubrique(null);
            }
        }

        return $this;
    }
}
