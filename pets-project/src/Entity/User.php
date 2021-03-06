<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdPets", mappedBy="idUser")
     */
    private $adPets;

    /**
     * @ORM\Column(type="string", length=120,nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="users")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="sender")
     */
    private $comments;

    public function __construct()
    {
        parent::__construct();
        $this->adPets = new ArrayCollection();
        $this->comments = new ArrayCollection();
        // your own logic
    }

    /**
     * @return Collection|AdPets[]
     */
    public function getAdPets(): Collection
    {
        return $this->adPets;
    }

    public function addAdPet(AdPets $adPet): self
    {
        if (!$this->adPets->contains($adPet)) {
            $this->adPets[] = $adPet;
            $adPet->setIdUser($this);
        }

        return $this;
    }

    public function removeAdPet(AdPets $adPet): self
    {
        if ($this->adPets->contains($adPet)) {
            $this->adPets->removeElement($adPet);
            // set the owning side to null (unless already changed)
            if ($adPet->getIdUser() === $this) {
                $adPet->setIdUser(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setSender($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getSender() === $this) {
                $comment->setSender(null);
            }
        }

        return $this;
    }
}