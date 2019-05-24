<?php

namespace App\Entity;

use App\Entity\Publique;
use App\Entity\Association;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssociationRepository")
 * @Vich\Uploadable
 */
class Association 
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
    private $num_asso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_asso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_asso;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp_asso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville_asso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel1_asso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel2_asso;

    /**
     * @ORM\Column(type="date")
     */
    private $date_creation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress_correspondant; 

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Agasso", mappedBy="association")
     */
    private $agasso;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Events", inversedBy="associations")
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Activites", inversedBy="associations")
     */
    private $activites;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Publique", inversedBy="associations")
     */
    private $Publique;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName1")
     * 
     * @var File
     */
    private $imageFile1;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName1;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt1;

     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName2")
     * 
     * @var File
     */
    private $imageFile2;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName2;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt2;

     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName3")
     * 
     * @var File
     */
    private $imageFile3;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName3;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt3;

     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName4")
     * 
     * @var File
     */
    private $imageFile4;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName4;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt4;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName5")
     * 
     * @var File
     */
    private $imageFile5;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName5;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt5;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="association")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="association")
     */
    private $user; 

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile1(?File $imageFile1 = null): void
    {
        $this->imageFile1 = $imageFile1;

        if ($this->imageFile1 instanceof UploadedFile) { 
            $this->updatedAt1 = new \DateTime('now');
        }
    }

    public function getImageFile1(): ?File
    {
        return $this->imageFile1;
    }

    public function setImageName1(?string $imageName1): void
    {
        $this->imageName1 = $imageName1;
    }

    public function getImageName1(): ?string
    {
        return $this->imageName1;
    }

    public function setImageFile2(?File $imageFile2 = null): void
    {
        $this->imageFile2 = $imageFile2;

        if ($this->imageFile2 instanceof UploadedFile) {
            $this->updatedAt2 = new \DateTime('now');
        }
    }

    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }

    public function setImageName2(?string $imageName2): void
    {
        $this->imageName2 = $imageName2;
    }

    public function getImageName2(): ?string
    {
        return $this->imageName2;
    }

    public function setImageFile3(?File $imageFile3 = null): void
    {
        $this->imageFile3 = $imageFile3;

        if ($this->imageFile3 instanceof UploadedFile) {
            $this->updatedAt3 = new \DateTime('now');
        }
    }

    public function getImageFile3(): ?File
    {
        return $this->imageFile3;
    }

    public function setImageName3(?string $imageName3): void
    {
        $this->imageName3 = $imageName3;
    }

    public function getImageName3(): ?string
    {
        return $this->imageName3;
    }

    public function setImageFile4(?File $imageFile4 = null): void
    {
        $this->imageFile4 = $imageFile4;

        if ($this->imageFile4 instanceof UploadedFile) {
            $this->updatedAt4 = new \DateTime('now');
        }
    }

    public function getImageFile4(): ?File
    {
        return $this->imageFile4;
    }

    public function setImageName4(?string $imageName4): void
    {
        $this->imageName4 = $imageName4;
    }

    public function getImageName4(): ?string
    {
        return $this->imageName4;
    }

    

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    public function setImageFile5(?File $imageFile5 = null): void
    {
        $this->imageFile5 = $imageFile5;

        if ($this->imageFile5 instanceof UploadedFile) {
            $this->updatedAt5 = new \DateTime('now');
        }
    }

    public function getImageFile5(): ?File
    {
        return $this->imageFile5;
    }

    public function setImageName5(?string $imageName5): void
    {
        $this->imageName5 = $imageName5;
    }

    public function getImageName5(): ?string
    {
        return $this->imageName5;
    }

    public function __construct()
    {
        $this->agasso = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->activites = new ArrayCollection();
        $this->updatedAt = new \Datetime();
        $this->updatedAt1 = new \Datetime();
        $this->updatedAt2 = new \Datetime();
        $this->updatedAt3 = new \Datetime();
        $this->updatedAt4 = new \Datetime();
        $this->updatedAt5 = new \Datetime();
        $this->publique = new ArrayCollection();
        $this->Publique = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAsso(): ?int
    {
        return $this->num_asso;
    }

    public function setNumAsso(int $num_asso): self
    {
        $this->num_asso = $num_asso;

        return $this;
    }

    public function getNomAsso(): ?string
    {
        return $this->nom_asso;
    }

    public function setNomAsso(string $nom_asso): self
    {
        $this->nom_asso = $nom_asso;

        return $this;
    }

    public function getAdresseAsso(): ?string
    {
        return $this->adresse_asso;
    }

    public function setAdresseAsso(string $adresse_asso): self
    {
        $this->adresse_asso = $adresse_asso;

        return $this;
    }

    public function getCpAsso(): ?int
    {
        return $this->cp_asso;
    }

    public function setCpAsso(int $cp_asso): self
    {
        $this->cp_asso = $cp_asso;

        return $this;
    }

    public function getVilleAsso(): ?string
    {
        return $this->ville_asso;
    }

    public function setVilleAsso(string $ville_asso): self
    {
        $this->ville_asso = $ville_asso;

        return $this;
    }

    public function getTel1Asso(): ?string
    {
        return $this->tel1_asso;
    }

    public function setTel1Asso(?string $tel1_asso): self
    {
        $this->tel1_asso = $tel1_asso;

        return $this;
    }

    public function getTel2Asso(): ?string
    {
        return $this->tel2_asso;
    }

    public function setTel2Asso(?string $tel2_asso): self
    {
        $this->tel2_asso = $tel2_asso;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getAdressCorrespondant(): ?string
    {
        return $this->adress_correspondant;
    }

    public function setAdressCorrespondant(string $adress_correspondant): self
    {
        $this->adress_correspondant = $adress_correspondant;

        return $this;
    }

    /**
     * @return Collection|agasso[]
     */
    public function getAgasso(): Collection
    {
        return $this->agasso;
    }

    public function addAgasso(agasso $agasso): self
    {
        if (!$this->agasso->contains($agasso)) {
            $this->agasso[] = $agasso;
            $agasso->setAssociation($this);
        }

        return $this;
    }

    public function removeAgasso(agasso $agasso): self
    {
        if ($this->agasso->contains($agasso)) {
            $this->agasso->removeElement($agasso);
            // set the owning side to null (unless already changed)
            if ($agasso->getAssociation() === $this) {
                $agasso->setAssociation(null);
            }
        }

        return $this;
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

    /**
     * @return Collection|activites[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(activites $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
        }

        return $this;
    }

    public function removeActivite(activites $activite): self
    {
        if ($this->activites->contains($activite)) {
            $this->activites->removeElement($activite);
        }

        return $this;
    }

    public function __toString() {
        return $this->getNomAsso();
    }

    /**
     * @return Collection|Publique[]
     */
    public function getPublique(): Collection
    {
        return $this->Publique;
    }

    public function addPublique(Publique $publique): self
    {
        if (!$this->Publique->contains($publique)) {
            $this->Publique[] = $publique;
        }

        return $this;
    }

    public function removePublique(Publique $publique): self
    {
        if ($this->Publique->contains($publique)) {
            $this->Publique->removeElement($publique);
        }

        return $this;
    }

    public function setPublique(string $publique): self
    {
        $this->publique = $publique;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addAssociation($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeAssociation($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

}
