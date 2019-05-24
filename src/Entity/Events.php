<?php

namespace App\Entity;

use App\Entity\Events;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventsRepository")
 * @Vich\Uploadable
 */
class Events
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="date")
     */
    private $date_event;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descript_event;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="events")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Association", mappedBy="events")
     */
    private $associations;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Inscription", mappedBy="events")
     */
    private $inscriptions;

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

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->associations = new ArrayCollection();
        $this->updatedAt1 = new \Datetime();
        $this->updatedAt2 = new \Datetime();
        $this->updatedAt3 = new \Datetime();
        $this->updatedAt4 = new \Datetime();
        $this->inscriptions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->date_event;
    }

    public function setDateEvent(\DateTimeInterface $date_event): self
    {
        $this->date_event = $date_event;

        return $this;
    }

    public function getDescriptEvent(): ?string
    {
        return $this->descript_event;
    }

    public function setDescriptEvent(?string $descript_event): self
    {
        $this->descript_event = $descript_event;

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
            $user->addEvent($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeEvent($this);
        }

        return $this;
    }

    /**
     * @return Collection|Association[]
     */
    public function getAssociations(): Collection
    {
        return $this->associations;
    }

    public function addAssociation(Association $association): self
    {
        if (!$this->associations->contains($association)) {
            $this->associations[] = $association;
            $association->addEvent($this);
        }

        return $this;
    }

    public function removeAssociation(Association $association): self
    {
        if ($this->associations->contains($association)) {
            $this->associations->removeElement($association);
            $association->removeEvent($this);
        }

        return $this;
    }

    public function __toString(){
        return $this -> title;
    }

    /**
     * Get the value of updatedAt4
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt4()
    {
        return $this->updatedAt4;
    }

    /**
     * Set the value of updatedAt4
     *
     * @param  \DateTime  $updatedAt4
     *
     * @return  self
     */ 
    public function setUpdatedAt4(\DateTime $updatedAt4)
    {
        $this->updatedAt4 = $updatedAt4;

        return $this;
    }

    /**
     * Get the value of updatedAt1
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt1()
    {
        return $this->updatedAt1;
    }

    /**
     * Set the value of updatedAt1
     *
     * @param  \DateTime  $updatedAt1
     *
     * @return  self
     */ 
    public function setUpdatedAt1(\DateTime $updatedAt1)
    {
        $this->updatedAt1 = $updatedAt1;

        return $this;
    }

    /**
     * Get the value of updatedAt2
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt2()
    {
        return $this->updatedAt2;
    }

    /**
     * Set the value of updatedAt2
     *
     * @param  \DateTime  $updatedAt2
     *
     * @return  self
     */ 
    public function setUpdatedAt2(\DateTime $updatedAt2)
    {
        $this->updatedAt2 = $updatedAt2;

        return $this;
    }

    /**
     * Get the value of updatedAt3
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt3()
    {
        return $this->updatedAt3;
    }

    /**
     * Set the value of updatedAt3
     *
     * @param  \DateTime  $updatedAt3
     *
     * @return  self
     */ 
    public function setUpdatedAt3(\DateTime $updatedAt3)
    {
        $this->updatedAt3 = $updatedAt3;

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->addEvent($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->contains($inscription)) {
            $this->inscriptions->removeElement($inscription);
            $inscription->removeEvent($this);
        }

        return $this;
    } 
}
