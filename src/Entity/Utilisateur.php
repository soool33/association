<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity(
 *  fields={"email"},
 * message="L'email que vous avez indiquer et déjà utilisé !"
 * )
 */
class Utilisateur implements UserInterface
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
    private $utilisateurname;

    /**
     * @ORM\Column(type="string", length=255)
     * * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8")
     * @Assert\EqualTo(propertyPath="confirm_password")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password")
     */
    public $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUtilisateurname(): ?string
    {
        return $this->utilisateurname;
    }

    public function setUtilisateurname(string $utilisateurname): self
    {
        $this->utilisateurname = $utilisateurname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(){}

    public function getSalt(){}

    public function getUsername(){
        return $this->utilisateurname;
    }

    public function getRoles(){
        return ['ROLE_USER'];
    }
    
}
