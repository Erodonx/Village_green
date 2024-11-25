<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
     operations: [

     new Get(),  
     new Put(),
     new Patch(),
     new Delete(),
     new GetCollection(),
     new Post(), ]
)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    /*faire attention ici on a set l'id sur autre chose, mauvais délire.*/
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    // #[Groups(['user.index'])]
     #[Groups(['read'],['write'])]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    // #[Groups(['user.index'])]
    #[Groups(['read'],['write'],['commande:lecture'])]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable:true)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable:true)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255, nullable:true)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $pays = null;

    #[ORM\Column(length: 255, nullable:true)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $ville = null;

    #[ORM\Column(length: 10)]
     #[Groups(['read'],['write'])]
    // #[Groups(['user.index'])]
    private ?string $numero_mobile = null;

    #[ORM\Column(length: 255, nullable: true)]
    //#[Groups(['user.index'])]
    #[Groups(['read'],['write'])]
    private ?string $num_siret = null;

    #[ORM\Column]
    // #[Groups(['user.index'])]
    #[Groups(['read'],['write'])]
    private ?float $coefficient = null;

    #[ORM\Column]
    // #[Groups(['user.index'])]
    #[Groups(['read'],['write'])]
    private bool $isVerified = false;

    /**
     * @var Collection<int, Commande>
     */
    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $commandes;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'Employe')]
    private ?self $employeCharge = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'employeCharge')]
    private Collection $Employe;

    #[ORM\Column]
    private ?float $reduction = null;

    /**
     * @var Collection<int, Requete>
     */
    #[ORM\OneToMany(targetEntity: Requete::class, mappedBy: 'client')]
    private Collection $requetes;

    /**
     * @var Collection<int, Requete>
     */
    #[ORM\OneToMany(targetEntity: Requete::class, mappedBy: 'employeMess')]
    private Collection $requetesEmploye;

    /**
     * @var Collection<int, ContenuRequete>
     */
    #[ORM\OneToMany(targetEntity: ContenuRequete::class, mappedBy: 'Auteur')]
    private Collection $contenuRequetes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->Employe = new ArrayCollection();
        $this->requetes = new ArrayCollection();
        $this->requetesEmploye = new ArrayCollection();
        $this->contenuRequetes = new ArrayCollection();
    }

     public function getId(): ?int
     {
         return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNumeroMobile(): ?string
    {
        return $this->numero_mobile;
    }

    public function setNumeroMobile(string $numero_mobile): static
    {
        $this->numero_mobile = $numero_mobile;

        return $this;
    }

    public function getNumSiret(): ?string
    {
        return $this->num_siret;
    }

    public function setNumSiret(?string $num_siret): static
    {
        $this->num_siret = $num_siret;

        return $this;
    }

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): static
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

    public function getEmployeCharge(): ?self
    {
        return $this->employeCharge;
    }

    public function setEmployeCharge(?self $employeCharge): static
    {
        $this->employeCharge = $employeCharge;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getEmploye(): Collection
    {
        return $this->Employe;
    }

    public function addEmploye(self $employe): static
    {
        if (!$this->Employe->contains($employe)) {
            $this->Employe->add($employe);
            $employe->setEmployeCharge($this);
        }

        return $this;
    }

    public function removeEmploye(self $employe): static
    {
        if ($this->Employe->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getEmployeCharge() === $this) {
                $employe->setEmployeCharge(null);
            }
        }

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(?float $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * @return Collection<int, Requete>
     */
    public function getRequetes(): Collection
    {
        return $this->requetes;
    }

    public function addRequete(Requete $requete): static
    {
        if (!$this->requetes->contains($requete)) {
            $this->requetes->add($requete);
            $requete->setClient($this);
        }

        return $this;
    }

    public function removeRequete(Requete $requete): static
    {
        if ($this->requetes->removeElement($requete)) {
            // set the owning side to null (unless already changed)
            if ($requete->getClient() === $this) {
                $requete->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Requete>
     */
    public function getRequetesEmploye(): Collection
    {
        return $this->requetesEmploye;
    }

    public function addRequetesEmploye(Requete $requetesEmploye): static
    {
        if (!$this->requetesEmploye->contains($requetesEmploye)) {
            $this->requetesEmploye->add($requetesEmploye);
            $requetesEmploye->setEmployeMess($this);
        }

        return $this;
    }

    public function removeRequetesEmploye(Requete $requetesEmploye): static
    {
        if ($this->requetesEmploye->removeElement($requetesEmploye)) {
            // set the owning side to null (unless already changed)
            if ($requetesEmploye->getEmployeMess() === $this) {
                $requetesEmploye->setEmployeMess(null);
            }
        }

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
            $contenuRequete->setAuteur($this);
        }

        return $this;
    }

    public function removeContenuRequete(ContenuRequete $contenuRequete): static
    {
        if ($this->contenuRequetes->removeElement($contenuRequete)) {
            // set the owning side to null (unless already changed)
            if ($contenuRequete->getAuteur() === $this) {
                $contenuRequete->setAuteur(null);
            }
        }

        return $this;
    }


}
