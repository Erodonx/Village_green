<?php

namespace App\Entity;

use App\Repository\ContenuRequeteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContenuRequeteRepository::class)]
class ContenuRequete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000)]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'contenuRequetes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Requete $Requete = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getRequete(): ?Requete
    {
        return $this->Requete;
    }

    public function setRequete(?Requete $Requete): static
    {
        $this->Requete = $Requete;

        return $this;
    }
}
