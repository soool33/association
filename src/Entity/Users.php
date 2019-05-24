<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Association;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_licence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_fille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_user;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rue;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Activites", inversedBy="users")
     */
    private $activite_user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Events", inversedBy="users")
     */
    private $events;
    

    public function __construct()
    {
        $this->activite_user = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->association = new ArrayCollection();
    }

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Association", inversedBy="users")
     */
    private $association;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLicence(): ?int
    {
        return $this->num_licence;
    }

    public function setNumLicence(int $num_licence): self
    {
        $this->num_licence = $num_licence;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }


    public function getNomUser(): ?string
    {
        return $this->nom_user;
    }

    public function setNomUser(string $nom_user): self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getNomFille(): ?string
    {
        return $this->nom_fille;
    }

    public function setNomFille(?string $nom_fille): self
    {
        $this->nom_fille = $nom_fille;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenom_user;
    }

    public function setPrenomUser(string $prenom_user): self
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->tel1;
    }

    public function setTel1(?string $tel1): self
    {
        $this->tel1 = $tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user): self
    {
        $this->email_user = $email_user;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCpUser(): ?int
    {
        return $this->cp_user;
    }

    public function setCpUser(int $cp_user): self
    {
        $this->cp_user = $cp_user;

        return $this;
    }

    public function getVilleUser(): ?string
    {
        return $this->ville_user;
    }

    public function setVilleUser(string $ville_user): self
    {
        $this->ville_user = $ville_user;

        return $this;
    }

    /**
     * @return Collection|activites[]
     */
    public function getActiviteUser(): Collection
    {
        return $this->activite_user;
    }

    public function addActiviteUser(activites $activiteUser): self
    {
        if (!$this->activite_user->contains($activiteUser)) {
            $this->activite_user[] = $activiteUser;
        }

        return $this;
    }

    public function removeActiviteUser(activites $activiteUser): self
    {
        if ($this->activite_user->contains($activiteUser)) {
            $this->activite_user->removeElement($activiteUser);
        }

        return $this;
    }

    public function setActiviteUser($activite) {
        $this->activite_user[] = $activite;
    }

    /**
     * @return Collection|events[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(events $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
        }

        return $this;
    }

    public function removeEvent(events $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
        }

        return $this;
    }

    public function __toString()
    {
        return $this -> nom_user;
    }


    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|Association[]
     */
    public function getAssociation(): Collection
    {
        return $this->association;
    }

    public function addAssociation(association $association): self
    {
        if (!$this->association->contains($association)) {
            $this->association[] = $association;
        }

        return $this;
    }

    public function removeAssociation(association $association): self
    {
        if ($this->association->contains($association)) {
            $this->association->removeElement($association);
        }

        return $this;
    }

    public function setAssociation(association $association)
    {
        if (!$this->association->contains($association)) {
            $this->association[] = $association;
        }

        return $this;
    } 


}
