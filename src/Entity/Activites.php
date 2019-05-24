<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Activites;
use App\Entity\Association;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivitesRepository")
 * @Vich\Uploadable
 */
class Activites
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255, minMessage="Votre titre dois avoir Minimun 5 Caracteres")
     */
    private $title_activite;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(min=5)
     */
    private $decript_activite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="activite_user")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Association", mappedBy="activites")
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

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->associations = new ArrayCollection();
        $this->updatedAt1 = new \Datetime();
        $this->updatedAt2 = new \Datetime();
        $this->updatedAt3 = new \Datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleActivite(): ?string
    {
        return $this->title_activite;
    }

    public function setTitleActivite(string $title_activite): self
    {
        $this->title_activite = $title_activite;

        return $this;
    }

    public function getDecriptActivite(): ?string
    {
        return $this->decript_activite;
    }

    public function setDecriptActivite(?string $decript_activite): self
    {
        $this->decript_activite = $decript_activite;

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
            $user->addActiviteUser($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeActiviteUser($this);
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
            $association->addActivite($this);
        }

        return $this;
    }

    public function removeAssociation(Association $association): self
    {
        if ($this->associations->contains($association)) {
            $this->associations->removeElement($association);
            $association->removeActivite($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this -> title_activite;
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
}
